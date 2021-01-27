<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 10; $i++) {
        $new_post = new Post();
        $new_post->title = $faker->sentence($nbWords = 8, $variableNbWords = true);
        $new_post->subtitle = $faker->sentence($nbWords = 8, $variableNbWords = true);
        $new_post->author = $faker->name();
        $new_post->content = $faker->text();
        $new_post->date = $faker->date();
        //creo lo slug con una stringa contenente il titolo del post; il separatore di default e' un trattino
        $slug = Str::slug($new_post->title);
        //verifico che lo slug sia unico all'interno del database
        $current_post = Post::where('slug', $slug)->first();
        $slug_base = $slug;
        $counter = 1;
        //se esiste gia', concateno un numero allo slug base
        while ($current_post) {
          $slug = $slug_base . '-' . $counter;
          $counter++;
          $current_post = Post::where('slug', $slug)->first();
        }
        $new_post->slug = $slug;
        $new_post->save();
      }
    }
}
