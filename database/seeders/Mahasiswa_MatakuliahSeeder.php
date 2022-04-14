<?php

namespace Database\Seeders;

use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Mahasiswa_MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 1,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 2,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 3,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 4,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 1,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 2,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 3,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 4,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 1,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 2,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 3,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 4,
                'nilai' => 'B',
            ],

            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 1,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 2,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 3,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 4,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 1,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 2,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 3,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 4,
                'nilai' => 'A',
            ],

            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 1,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 2,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 3,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 4,
                'nilai' => 'A',
            ],

            [
                'mahasiswa_id' => 8,
                'matakuliah_id' => 1,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 8,
                'matakuliah_id' => 2,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 8,
                'matakuliah_id' => 3,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 8,
                'matakuliah_id' => 4,
                'nilai' => 'B',
            ],

        ];

       DB::table('mahasiswa_matakuliah')->insert($data);
    }
}
