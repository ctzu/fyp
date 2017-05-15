<?php

use Illuminate\Database\Seeder;
use App\StudentStatus;

class StudentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Sangat Aktif',
            'Aktif',
            'Tidak Aktif'
        ];

        foreach ($data as $datum) {
            StudentStatus::create([
                'label_pelajar' => $datum
            ]);
        }
    }
}
