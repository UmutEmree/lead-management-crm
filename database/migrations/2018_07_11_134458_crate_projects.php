<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tesekkur_sayfasi');
            $table->string('mail_adresi');
            $table->string('mail_adresi2');
            $table->string('mail_adresi3');
            $table->string('mail_adresi4');
            $table->string('mail_adresi5');
            $table->string('mail_baslik');
            $table->integer('marka_id')->unsigned();
            $table->timestamps();
            $table->foreign('marka_id')->references('id')->on('markalar')->onDelete('cascade');
                });
         
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
