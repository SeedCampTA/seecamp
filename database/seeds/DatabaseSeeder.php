<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        // App\User::query()->delete();
        $a = [
        	'username' => 'testtest',
			'password' => bcrypt('testtest'),
			'firstname' => 'kamonkwun',
			'lastname' => 'kwunkwun123',
		];
    	App\User::create[$a];
        Model::reguard();
        // $this->call(UsersTableSeeder::class);
        
    }
}
