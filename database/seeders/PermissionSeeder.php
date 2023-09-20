<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            ['id' => 1, 'name' => 'dashboard',              'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'products',               'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'purchases',              'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'sales',                  'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'expenses',               'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'peoples',                'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'settings',               'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
        ];
        foreach ($data as $d) {
            if(DB::table('permissions')->where('name', $d['name'])->count() < 1){
                DB::table('permissions')->insert($d);
            }
        }
    }
}
