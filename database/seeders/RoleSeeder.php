<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::Create(['name'=>'Admin']);
        $role2 = Role::Create(['name'=>'Blogger']);

        Permission::create(['name' => 'users.index'])->syncRoles($role1);
        Permission::create(['name' => 'users.edit'])->syncRoles($role1);
        Permission::create(['name' => 'users.destroy'])->syncRoles($role1);
        Permission::create(['name' => 'product.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'list.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'list.edit'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'list.destroy'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'add'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'filterProduct'])->syncRoles($role1,$role2);
    }
}
