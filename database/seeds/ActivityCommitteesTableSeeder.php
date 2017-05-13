<?php

use Illuminate\Database\Seeder;
use App\ActivityCommittee;

class ActivityCommitteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Pengarah',
            'Ketua Program',
            'Penolong Ketua Program',
            'Bendahari', 'Penolong Bendahari',
            'Setiausaha',
            'AJK Program',
            'AJK Publisiti',
            'AJK Makanan',
            'AJK Logistik',
            'AJK Protokol',
            'AJK Pengangkutan',
            'AJK Keselamatan',
            'Peserta'
            ];

        foreach ($data as $datum) {
            ActivityCommittee::create([
                'name' => $datum
            ]);
        }
    }
}
