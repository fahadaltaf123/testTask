<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SendPostCreatedMailToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send_post_created_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post created mail to user after creating mail.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $details['email'] = Auth::user()->email;
        dispatch(new App\Jobs\PostEmailJob($details));
        return response()->json(['message'=>'Mail Send Successfully!!']);
    }
}
