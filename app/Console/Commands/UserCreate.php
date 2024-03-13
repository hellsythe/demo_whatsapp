<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'camilo@sdkconsultoria.com';
        $user->password = base64_encode(random_bytes(10));
        $user->email_verified_at = date('Y-m-d h:i:s');
        $user->save();

        $this->info('User created successfully');
        $this->info($user->createToken('token')->plainTextToken);
    }
}
