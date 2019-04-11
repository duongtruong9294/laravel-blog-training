<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $author = Role::create([
            'name' => 'Phóng viên', 
            'slug' => 'author',
            'permissions' => [
                'new.create' => true,
            ]
        ]);

        $editor = Role::create([
            'name' => 'Biên tập viên', 
            'slug' => 'editor',
            'permissions' => [
                'new.update' => true,
                'new.status' => true,
            ]
        ]);
    }
}
