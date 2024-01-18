<?php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    protected $model = Result::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'milliseconds' => rand(1000, 15000),
            'member_id' => \App\Models\Member::inRandomOrder()->first()->id
        ];
    }
}
