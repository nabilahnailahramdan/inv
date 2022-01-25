<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruangs')->insert([
            [
                'kode'      =>'PERPUS',
                'nama'      =>'Ruang Perpustakaan',
                'keterangan'=>'Ruangan Perpustakaan',
            ],
            [
                'kode'      =>'RTU',
                'nama'      =>'Ruang TU',
                'keterangan'=>'Ruangan Tata Usaha',
            ],
            [
                'kode'      =>'LRPL01',
                'nama'      =>'Lab RPL 01',
                'keterangan'=>'Laboratorium RPL 01',
            ],
        ]);
    }
}
