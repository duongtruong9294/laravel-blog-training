<?php

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
        DB::table('users')->insert(
			[
				[
		            'username' => 'superadmin',
		            'email' => 'superadmin@gmail.com',
		            'password' => bcrypt('123456'),
		            'fullname' => 'SUPER ADMIN',
		            'address' => '43 VANHWARE',
		            'level' => 1,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime()
	    		],
	    		[
		            'username' => 'admin',
		            'email' => 'admin@gmail.com',
		            'password' => bcrypt('123456'),
		            'fullname' => 'FAKE ADMIN',
		            'address' => '43 VANGHOME',
		            'level' => 1,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime()
	    		],
	    		[
		            'username' => 'member',
		            'email' => 'member.@gmail.com',
		            'password' => bcrypt('123456'),
		            'fullname' => 'FAKE MEMBER',
		            'address' => '43 HOMEWANG',
		            'level' => 2,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime()
	    		],
	    		[
		            'username' => 'member123',
		            'email' => 'member123.@gmail.com',
		            'password' => bcrypt('123456'),
		            'fullname' => 'FAKE MEMBER123',
		            'address' => '23 HOMEWANG',
		            'level' => 2,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime()
	    		],
	    		[
		            'username' => 'duong123',
		            'email' => 'duong123.@gmail.com',
		            'password' => bcrypt('123456'),
		            'fullname' => 'TV DUONG123',
		            'address' => '27 TVSQFQRT',
		            'level' => 3,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime()
	    		],
	    		[
		            'username' => 'duong123456',
		            'email' => 'duong123456.@gmail.com',
		            'password' => bcrypt('123456'),
		            'fullname' => 'TV MIKLTEA',
		            'address' => '96 MIKLTEA',
		            'level' => 3,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime()
	    		]
			]
    	);
    }
}
