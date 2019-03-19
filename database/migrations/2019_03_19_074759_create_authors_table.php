<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_AUTHOR', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('desc');
            $table->text('author_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_AUTHOR');
        //2019_03_19_074759
        //2019_03_19_074814
    }
}
