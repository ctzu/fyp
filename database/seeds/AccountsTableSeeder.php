<?php

use Illuminate\Database\Seeder;
use App\User;
use App\SMPUser;
use App\Lecturer;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Cipta akaun pentadbir
         */
        $pentadbir = User::create([
            'name'     => 'Pentadbir Sistem',
            'email'    => 'pentadbir@gmail.com',
            'password' => bcrypt('password'),
            'role'     => 'Administrator'
        ]);

        /**
         * Cipta akaun pelajar
         */
        $pelajar = User::create([
            'name'     => 'Siti Zuraidah',
            'email'    => 'ctzu@gmail.com',
            'password' => bcrypt('password'),
            'role'     => 'Student'
        ]);

        $pelajar->student()->create([
            'students_no' => 'A149478'
        ]);

        /**
         * Cipta akaun pensyarah
         */
        $pensyarah = User::create([
            'name'     => 'Pensyarah',
            'email'    => 'pensyarah@gmail.com',
            'password' => bcrypt('password'),
            'role'     => 'Lecturer'
        ]);

        Lecturer::create([
            'user_id' => $pensyarah->id
        ]);

        $pensyarah2 = User::create([
            'name'     => 'Dr Dian',
            'email'    => 'dian@gmail.com',
            'password' => bcrypt('password'),
            'role'     => 'Lecturer'
        ]);

        Lecturer::create([
            'user_id' => $pensyarah2->id
        ]);

        /**
         * Cipta akaun pelajar
         */
        $pelajar = SMPUser::create([
            'name'     => 'Siti Zuraidah',
            'email'    => 'ctzu@gmail.com',
            'password' => bcrypt('password'),
            'role'     => 'Student'
        ]);

    }
}
