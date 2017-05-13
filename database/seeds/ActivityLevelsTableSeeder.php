<?php

use Illuminate\Database\Seeder;
use App\ActivityLevel;

class ActivityLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Antarabangsa',
            'Kebangsaan',
            'Negeri',
            'Universiti',
            'Jabatan',
            'Kolej',
            'Mahasiswa',
            'Lain-lain'
        ];

        foreach ($data as $datum) {
            ActivityLevel::create([
                'label' => $datum
            ]);
        }
    }
}
