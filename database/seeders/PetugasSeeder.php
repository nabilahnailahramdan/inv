<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;
class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'nama'=>'Administrator',
            'username'=>'admin',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'level'=>'admin',
            'no_telepon'=>'081395243260',
            'remember_token' => Str::random(10),   
        ]);

        \App\Models\Petugas::factory(10)->create();
    }
}
