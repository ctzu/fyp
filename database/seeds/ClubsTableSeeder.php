<?php

use Illuminate\Database\Seeder;
use App\Club;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Robotics Club',
            'Interactive Multimedia',
            'Mobile Apps Development',
            'Video Innovation',
            'Open Source(NUMOSS)',
            'Lensa Informatics',
            'iBusiness Innovative',
            'Cyber Ethics',
            'Intelligent Machines',
            'Programming Challenge Club',
            'Imagine Cup'
        ];

        foreach ($data as $datum) {
            Club::create([
                'name' => $datum,
                'lecturer_id' => rand(3, 4)
            ]);


        }
    }
}
