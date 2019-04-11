<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$author = Role::where('slug', 'author')->first();
        $editor = Role::where('slug', 'editor')->first();
        
        $user1 = User::create([
            'username' => 'pvien01',
            'fullname' => 'Phóng viên 1',
            'email' => 'pv1@allaravel.dev',
            'password' => bcrypt('123456')
        ]);
        $user1->roles()->attach($author);
        
        $user2 = User::create([
            'username' => 'pvien02',
            'fullname' => 'Phóng viên 2',
            'email' => 'pv2@allaravel.dev',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($author);
        
        $user3 = User::create([
            'username' => 'btvien01',
            'username' => 'Biên tập viên 1',
            'email' => 'btv1@allaravel.dev',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($editor);
    }
}
