<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 9; $i++) {
        $new_post = new Post();
        $new_post->title = $faker->sentence($nbWords = 8, $variableNbWords = true);
        $new_post->subtitle = $faker->sentence($nbWords = 8, $variableNbWords = true);
        $new_post->author = $faker->name();
        $new_post->content = $faker->text();
        $new_post->date = $faker->date();
        $new_post->save();
      }
    }
}
