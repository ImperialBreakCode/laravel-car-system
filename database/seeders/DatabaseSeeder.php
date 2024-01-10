<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->AddMercedes();
        $this->AddAudi();
    }

    public function AddAudi(): void
    {
        DB::table('manufacturers')->insert([
            'id' => 2,
            'name' => 'audi',
            'slug' => 'audi',
            'founded' => new \DateTime('July 16, 1909')
        ]);

        DB::table('manufacturer_models')->insert([
            'id' => 3,
            'name' => 'a1',
            'slug' => 'a1',
            'manufacturer_id' => 2
        ]);

        DB::table('manufacturer_models')->insert([
            'id' => 4,
            'name' => 'a3',
            'slug' => 'a3',
            'manufacturer_id' => 2
        ]);

        DB::table('cars')->insert([
            'year_of_manufacturing' => 2027,
            'kilometers_traveled' => 0,
            'manufacturer_id' => 2,
            'model_id' => 3
        ]);

        DB::table('cars')->insert([
            'year_of_manufacturing' => 1999,
            'kilometers_traveled' => 30,
            'manufacturer_id' => 2,
            'model_id' => 3
        ]);

        DB::table('cars')->insert([
            'year_of_manufacturing' => 2000,
            'kilometers_traveled' => 400000,
            'manufacturer_id' => 2,
            'model_id' => 4
        ]);

        DB::table('cars')->insert([
            'year_of_manufacturing' => 2023,
            'kilometers_traveled' => 1000,
            'manufacturer_id' => 2,
            'model_id' => 4
        ]);
    }

    public function AddMercedes(): void
    {
        DB::table('manufacturers')->insert([
            'id' => 1,
            'name' => 'mercedes-benz',
            'slug' => 'mercedes',
            'founded' => new \DateTime('June 28, 1926')
        ]);

        DB::table('manufacturer_models')->insert([
            'id' => 1,
            'name' => 'c class',
            'slug' => 'c-class',
            'manufacturer_id' => 1
        ]);

        DB::table('manufacturer_models')->insert([
            'id' => 2,
            'name' => 'e class',
            'slug' => 'e-class',
            'manufacturer_id' => 1
        ]);

        DB::table('cars')->insert([
            'year_of_manufacturing' => 2022,
            'kilometers_traveled' => 30000,
            'manufacturer_id' => 1,
            'model_id' => 2
        ]);

        DB::table('cars')->insert([
            'year_of_manufacturing' => 2010,
            'kilometers_traveled' => 200000,
            'manufacturer_id' => 1,
            'model_id' => 1
        ]);
    }
}
