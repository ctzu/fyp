<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSMPUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('smp_mysql')->create('smp_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('matric_no', 10)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['Student', 'Lecturer', 'Administrator'])->default('Student');
            $table->rememberToken();
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
        Schema::dropIfExists('smp_users');
    }
}
