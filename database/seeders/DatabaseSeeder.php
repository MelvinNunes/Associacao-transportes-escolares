<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert(
            [
                'name' => 'administrador',
                'email' => 'admin@gmail.com',
                'contact' => '84101000',
                'address' => 'Av Eduardo Mondlane',
                'is_admin' => true,
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
