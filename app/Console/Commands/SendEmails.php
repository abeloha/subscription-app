<?php

namespace App\Console\Commands;

use App\Events\Published;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {post_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command send email about the post to the webstie subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::find($this->argument('post_id'));

        if(!$post){
            $this->error('Invalid post id!');
            return;
        }

        Published::dispatch($post);

        $this->info('Email sent successful!');

    }
}
