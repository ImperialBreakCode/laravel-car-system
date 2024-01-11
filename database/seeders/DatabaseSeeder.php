<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\ManufacturerModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'seed user',
            'email' => 'seed@example.com',
            'password' => Hash::make('password'),
        ]);

        Manufacturer::factory()->count(3)->create();
        ManufacturerModel::factory()->count(5)->create();
        Car::factory()->count(10)->create();
    }
}
