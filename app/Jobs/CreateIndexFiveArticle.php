<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Article;

use Redis;

class CreateIndexFiveArticle extends Job implements SelfHandling
{
    protected $article;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $articles = Article::get();

        dd($articles);
    }
}
