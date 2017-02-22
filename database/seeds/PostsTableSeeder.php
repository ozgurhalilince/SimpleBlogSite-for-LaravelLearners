<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutme = new \App\Post;
        $aboutme->id = 1;
        $aboutme->title = "Hakkımda";
        $aboutme->slug = "hakkimda";
        $aboutme->content = "";
        $aboutme->deleted_at = NULL;
        $aboutme->save();
    }
}
