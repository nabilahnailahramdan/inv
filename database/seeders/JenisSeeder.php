<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis')->insert([
            [
                'kode'=>'LP',
                'nama'=>'Laptop',
                'keterangan'=>'Laptop dan Notebook',
            ],
            [
                'kode'=>'KOM',
                'nama'=>'Komputer',
                'keterangan'=>'Komputer PC dan Desktop',
            ],
            [
                'kode'=>'INF',
                'nama'=>'Infocus',
                'keterangan'=>'Infocus',
            ],
            [
                'kode'=>'KR',
                'nama'=>'Kursi',
                'keterangan'=>'Jenis-jenis Kursi',
            ],
            [
                'kode'=>'MJ',
                'nama'=>'Meja',
                'keterangan'=>'Jenis-jenis Meja',
            ],
        ]);
    }
}
