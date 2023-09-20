<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['id' => 1, 'name' => 'Admin',                  'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Manager',                'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Puechases',              'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Sales',                  'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($data as $d) {
            if(DB::table('roles')->where('name', $d['name'])->count() < 1){
                DB::table('roles')->insert($d);
            }
        }
    }
}
