<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(
			[
				[
		            'username' => Str::random(30),
		            'description' => Str::random(255),
		            'image' => '',
		            'user_id' => 1,
		            'category_id' => 1,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime(),
		            'status' => 1
	    		],
	    		[
		            'username' => Str::random(30),
		            'description' => Str::random(255),
		            'image' => '',
		            'user_id' => 2,
		            'category_id' => 2,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime(),
		            'status' => 1
	    		],
	    		[
		            'username' => Str::random(30),
		            'description' => Str::random(255),
		            'image' => '',
		            'user_id' => 1,
		            'category_id' => 2,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime(),
		            'status' => 0
	    		],
	    		[
		           'username' => Str::random(30),
		            'description' => Str::random(255),
		            'image' => '',
		            'user_id' => 2,
		            'category_id' => 1,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime(),
		            'status' => 1
	    		],
	    		[
		            'username' => Str::random(30),
		            'description' => Str::random(255),
		            'image' => '',
		            'user_id' => 2,
		            'category_id' => 1,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime(),
		            'status' => 0
	    		],
	    		[
		            'username' => Str::random(30),
		            'description' => Str::random(255),
		            'image' => '',
		            'user_id' => 2,
		            'category_id' => 2,
		            'created_at' => new DateTime(),
		            'updated_at' => new DateTime(),
		            'status' => 0
	    		]
			]
    	);
    }
}
