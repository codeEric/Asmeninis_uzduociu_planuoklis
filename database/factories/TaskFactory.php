<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{

  public function definition(): array
  {
    $statuses = \App\Models\Status::all();
    $range = range(1, $statuses->count());
    $random = collect($range)->shuffle()->slice(0, 1);
    dd($statuses);
    return [
      'task_name' => fake()->word(),
      'task_description' => fake()->text(50),
      'status_id' => $statuses[$random[0]],
      'add_date' => fake()->dateTimeThisYear(),
      'completed_date' => null
    ];
  }
}
