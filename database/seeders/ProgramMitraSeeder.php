<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramMitra;

class ProgramMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramMitra::create([
            'nama_program' => 'Basic',
            'harga' => 100000,
            'deskripsi' => 'Deskripsi Program A',
        ]);

        ProgramMitra::create([
            'nama_program' => 'Standar',
            'harga' => 1500000,
            'deskripsi' => 'Deskripsi Program B',
        ]);
        ProgramMitra::create([
            'nama_program' => 'Premium',
            'harga' => 2000000,
            'deskripsi' => 'Deskripsi Program B',
        ]);


        // Tambahkan lebih banyak data jika diperlukan
    }
}
