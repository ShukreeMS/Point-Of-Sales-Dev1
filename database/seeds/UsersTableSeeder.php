<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        	[
        		'name'		=>	'Shukree Shafeek',
        		'email'		=>	'shukree@gmail.com',
        		'password'	=>	bcrypt('12345'),
        		'photos'	=>	'lendis.jpg',
        		'level'		=>	1
        	],
        	[
        		'name'		=>	'Divia Nugrahtino',
        		'email'		=>	'lendisdiary@gmail.com',
        		'password'	=>	bcrypt('qwertyuiop'),
        		'photos'	=>	'avatar.png',
        		'level'		=>	2
			],
			[
        		'name'		=>	'Simon Jet',
        		'email'		=>	'simon2@gmail.com',
        		'password'	=>	bcrypt('hobbit79'),
        		'photos'	=>	'avatar.png',
        		'level'		=>	1
        	]
        ));
    }
}
