<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        $faker = \Faker\Factory::create();

        for($index = 0; $index < 50; $index++) {
            Article::create([
                'name' => $faker->name,
                'size' => $faker->numberBetween(5000, 20000),
            ]);
        }
    }
}
