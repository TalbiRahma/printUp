<?php

namespace App\Console\Commands;

use App\Mail\MailVerification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEnvoi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data=['content'=> 'bonjour'];
        Mail::to('talbirahma73@gmail.com')->send(new MailVerification($data));
        return 0;
    }
}
