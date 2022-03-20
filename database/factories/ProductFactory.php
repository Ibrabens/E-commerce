<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoriesIDs = DB::table('categories')->pluck('id');
        $category_id = $this->faker->randomElement($categoriesIDs);
        $category_name = DB::table('categories')->where('id',$category_id)->first()->name;
        $array=['XS','S','M','L','XL'];
        $state=['standard','solde'];
        $all = Storage::allFiles('public/images/'.$category_name.'s/');
        $picture=substr(Arr::random($all),7);
        return [
            'category_id' => $category_id,
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'picture' => $picture,
            'price' => $this->faker->randomDigit,
            'size'=>implode(",",Arr::random($array,2)),
            'visible' =>(bool)rand(0,1),
            'state' =>Arr::random($state),
            'reference' => Str::random(16),
        ];
    }
}
