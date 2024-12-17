<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \DB::table('designations')->insert([
            ['name' => 'Manager', 'created_at' => now()],
            ['name' => 'Developer', 'created_at' => now()],
            ['name' => 'Designer', 'created_at' => now()],
        ]);
        \DB::table('departments')->insert([
            ['name' => 'IT', 'created_at' => now()],
            ['name' => 'HR', 'created_at' => now()],
            ['name' => 'Finance', 'created_at' => now()],
        ]);
        \DB::table('users')->insert([
            ['name' => 'ashiq', 'department_id' => 1, 'designation_id' => 2, 'phone_number' => '1234567890', 'created_at' => now()],
            ['name' => 'John', 'department_id' => 2, 'designation_id' => 1, 'phone_number' => '0987652341', 'created_at' => now()],
            ['name' => 'James', 'department_id' => 2, 'designation_id' => 3, 'phone_number' => '0987654321', 'created_at' => now()],
            ['name' => 'Kevin', 'department_id' => 1, 'designation_id' => 2, 'phone_number' => '0987657891', 'created_at' => now()],
            ['name' => 'Micle', 'department_id' => 1, 'designation_id' => 1, 'phone_number' => '09823454321', 'created_at' => now()],
            ['name' => 'Soniya', 'department_id' => 3, 'designation_id' => 3, 'phone_number' => '0987655678', 'created_at' => now()],
        ]);
    }
}
