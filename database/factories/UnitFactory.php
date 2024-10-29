<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    protected $model = Unit::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'shortTitle' => strtoupper($this->faker->lexify('??')),
        ];
    }
}
