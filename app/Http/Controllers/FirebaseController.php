<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;


class FirebaseController extends Controller
{
    
    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-b477e-firebase-adminsdk-jtacl-38eddd04cf.json');
        
        $firebase = (new Factory)
                        ->withServiceAccount($serviceAccount)
                        ->withDatabaseUri('https://laravelfirebase-b477e.firebaseio.com')
                        ->create();

        $database = $firebase->getDatabase();      
        $allBooks = $database -> getReference('books')->getValue();
        $dataArray = [];

        foreach($allBooks as $key => $values){

            $cat_id = $values["category_id"];

            $author_id = $values["author_id"];
            
            $data = array(

                "book_id" => $values["book_id"],
                "book_name" => $values["name"],
                "book_desc" => $values["desc"],
                "category_id" => $values["category_id"],
                "category_data_source" => $database -> getReference('categories/'.$cat_id) -> getValue(),
                "book_photo" => $values["book_photo"],
                "author_id" => $values["author_id"],
                "author" => $database -> getReference('authors/'.$author_id)->getValue()
            );

        
            array_push($dataArray,$data);
            
        }

        $finaArray = array( 
            "code" => 200,
            "message" => "Successful",
            "data" => $dataArray
        );
        return response()->json($finaArray);
    }
}
