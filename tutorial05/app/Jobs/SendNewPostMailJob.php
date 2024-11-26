<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use Illuminate\Support\Facades\Mail;
use App\Mail\PostMail;

class SendNewPostMailJob implements ShouldQueue
{
    use Queueable;

    private string $userName;
    private string $userEmail;
    private string $title;
    private string $content;
    private string|null $thumbnail;
    private string $postUrl;

    /**
     * Create a new job instance.
     */
    public function __construct(string $title, string $content, string|null $thumbnail, string $postUrl)
    {
        $tempUser = auth()->user();

        $this->userName = $tempUser->name;
        $this->userEmail = $tempUser->email;
        unset($tempUser);
        $this->title = $title;
        $this->content = $content;
        $this->thumbnail = $thumbnail;
        $this->postUrl = $postUrl;
    }

    //An email send to the user email, when a new post from them is created
    private function welcomePostMail(): bool
    {
        $mailSent = false;

        try
        {
            $mailAttr = [
                "name" => $this->userName,
                "title" => $this->title,
                "content" => $this->content,
                "thumbnail" => $this->thumbnail,
                "postUrl" => $this->postUrl
            ];
            $mailInstance = new PostMail($mailAttr);

            $mailToSend = Mail::to($this->userEmail);

            $response = $mailToSend->send($mailInstance);//Returns SentMessage on success or null when cannot send

            if(!empty($response))
                $mailSent = true;
        }
        catch(\Exception $error)
        {
            $mailSent = false;
        }

        return $mailSent;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->welcomePostMail();
    }
}
