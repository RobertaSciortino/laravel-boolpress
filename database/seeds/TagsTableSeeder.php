<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;
use Illuminate\Support\Str;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 6 ; $i++) {
        $new_tag = new Tag();
        $new_tag->name = $faker->word;

        $slug = Str::slug($new_tag->name);
        $current_tag = Tag::where('slug', $slug)->first();
        $slug_base = $slug;
        $counter = 1;
        while ($current_tag) {
          $slug = $slug_base . '-' . $counter;
          $counter++;
          $current_tag = Tag::where('slug', $slug)->first();
        }
        $new_tag->slug = $slug;
        $new_tag->save();
      }
    }
}
