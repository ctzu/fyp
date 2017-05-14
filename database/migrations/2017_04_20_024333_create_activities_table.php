<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('club_id')->index();
            $table->string('name'); // Nama Aktiviti
            $table->string('place'); // Tempat Aktiviti
            $table->date('date'); // Tarikh Aktiviti
            $table->unsignedInteger('activity_level_id')->index(); // Peringkat
            $table->unsignedInteger('activity_achievement_id'); // Pencapaian
            $table->unsignedInteger('activity_committee_id')->index(); // Jawatankuasa
            $table->unsignedInteger('activity_status_id')->index(); // Status
            $table->unsignedInteger('created_by')->index();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('clubs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_level_id')->references('id')->on('activity_levels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_achievement_id')->references('id')->on('activity_achievements')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_committee_id')->references('id')->on('activity_committees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_status_id')->references('id')->on('activity_statuses')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('activities');
    }
}
