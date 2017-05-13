<?php

use Illuminate\Database\Seeder;
use App\ActivityStatus;

class ActivityStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Sedang Diproses',
            'Diluluskan',
            'Tidak Diluluskan'
        ];

        foreach ($data as $datum) {
            ActivityStatus::create([
                'label' => $datum
            ]);
        }
    }
}
