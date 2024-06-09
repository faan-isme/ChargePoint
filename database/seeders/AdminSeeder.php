<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin kece',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Tambahkan lebih banyak data admin jika diperlukan
    }
}
