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

        \App\Models\Status::create([
            'name' => 'Finished'
        ]);

        \App\Models\Status::create([
            'name' => 'Unfinished'
        ]);

        \App\Models\Status::create([
            'name' => 'Delayed'
        ]);

        // \App\Models\Task::factory(10)->create();
    }
}
