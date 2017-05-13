<?php

use Illuminate\Database\Seeder;
use App\ActivityAchievement;

class ActivityAchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Emas',
            'Perak',
            'Gangsa',
            'Saguhati',
            'Tiada'
        ];

        foreach ($data as $datum) {
            ActivityAchievement::create([
                'label' => $datum
            ]);
        }
    }
}
