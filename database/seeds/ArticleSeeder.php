<?php

use Illuminate\Database\Seeder;

use App\Article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
        	'title' => 'ceshi',
        	'content' => '#aaa',
        	'html_content' => '<h1>aaa</h1>',
        	'user_id' => 1,
        	'catagory' => 1,
        ]);

        Article::create([
            'title' => 'ceshi2',
            'content' => '#aaa2',
            'html_content' => '<h1>aaa2</h1>',
            'user_id' => 2,
            'catagory' => 1,
        ]);
    }
}
