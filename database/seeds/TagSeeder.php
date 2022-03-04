<?php

use Illuminate\Support\Str;
use App\Model\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'food',
            'technology',
            'games',
            'books',
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug =  Str::slug($tag, '-');
            $newTag->save();
        }
    }
}
