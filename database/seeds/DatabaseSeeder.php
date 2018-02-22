<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'name' => 'Administrator',
        	'email' => 'admin@proplenx.com',
        	'password' => bcrypt('123456'),
        	'type' => 'Administrator',
            'role' => 1

    	));
    }

}