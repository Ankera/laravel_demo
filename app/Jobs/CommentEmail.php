<?php

namespace App\Jobs;

use App\Mail\BlogComment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CommentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $comment;

    /**
     * Create a new job instance.
     */
    public function __construct($comment)
    {
        //
        $this -> comment = $comment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        // 通知有新的评论
        Mail::to($this -> comment  -> blog  -> user) -> send(new BlogComment($this -> comment));
    }
}
