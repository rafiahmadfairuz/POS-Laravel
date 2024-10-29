<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Group;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'group_id' => Group::inRandomOrder()->first()->id,
            'unit_id' => Unit::inRandomOrder()->first()->id,
            'vat' => $this->faker->randomFloat(2, 5, 25),
            'product_type' => $this->faker->randomElement(['Digital Product', 'Physical Product']),
            'initial_quantity' => $this->faker->numberBetween(10, 100),
            'purchase_price' => $this->faker->randomFloat(2, 10, 100),
            'sell_price' => $this->faker->randomFloat(2, 20, 200),
            'sku' => $this->faker->unique()->numerify('SKU-##########'),
            'barcode' => $this->faker->unique()->ean13,
        ];
    }
}
