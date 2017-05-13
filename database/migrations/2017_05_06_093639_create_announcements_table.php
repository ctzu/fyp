<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // Nama Program
            $table->unsignedInteger('club_id')->index(); //Nama Kelab
            $table->string('description'); // Perincian Program
            $table->string('placeP'); //Tempat Program
            $table->date('dateP'); // Tarikh Program
            $table->unsignedInteger('created_by')->index();
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('clubs')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
