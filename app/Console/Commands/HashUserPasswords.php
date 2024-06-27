<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HashUserPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hash:user-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash existing user passwords';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if (!Hash::needsRehash($user->password)) {
                $hashedPassword = Hash::make($user->password);
                DB::table('users')->where('id', $user->id)->update([
                    'password' => $hashedPassword,
                ]);
        
                $this->info("User ID {$user->id} password hashed: {$hashedPassword}");
            } else {
                $this->info("User ID {$user->id} password already hashed.");
            }
        }
        
        

        $this->info('All user passwords have been hashed.');
        return 0;
    }
}
