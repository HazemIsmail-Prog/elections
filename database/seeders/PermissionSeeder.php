<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
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
        $permissions = [
            [
                'name' => 'dashboard_menu',
                'section_name' => 'dashboard',
                'description' => 'Dashboard Menu',
            ],

            [
                'name' => 'voting_menu',
                'section_name' => 'voting',
                'description' => 'Voting Menu',
            ],

            //roles
            [
                'name' => 'roles_menu',
                'section_name' => 'roles',
                'description' => 'Roles Menu',
            ],
            [
                'name' => 'roles_create',
                'section_name' => 'roles',
                'description' => 'Roles Create',
            ],
            [
                'name' => 'roles_edit',
                'section_name' => 'roles',
                'description' => 'Roles Edit',
            ],
            [
                'name' => 'roles_delete',
                'section_name' => 'roles',
                'description' => 'Roles Delete',
            ],

            //permissions
            [
                'name' => 'permissions_menu',
                'section_name' => 'permissions',
                'description' => 'Permissions Menu',
            ],
            [
                'name' => 'permissions_create',
                'section_name' => 'permissions',
                'description' => 'Permissions Create',
            ],
            [
                'name' => 'permissions_edit',
                'section_name' => 'permissions',
                'description' => 'Permissions Edit',
            ],
            [
                'name' => 'permissions_delete',
                'section_name' => 'permissions',
                'description' => 'Permissions Delete',
            ],

            //users

            [
                'name' => 'users_menu',
                'section_name' => 'users',
                'description' => 'Users Menu',
            ],
            [
                'name' => 'users_create',
                'section_name' => 'users',
                'description' => 'Users Create',
            ],
            [
                'name' => 'users_edit',
                'section_name' => 'users',
                'description' => 'Users Edit',
            ],
            [
                'name' => 'users_delete',
                'section_name' => 'users',
                'description' => 'Users Delete',
            ],

            //schools

            [
                'name' => 'schools_menu',
                'section_name' => 'schools',
                'description' => 'Schools Menu',
            ],
            [
                'name' => 'schools_create',
                'section_name' => 'schools',
                'description' => 'Schools Create',
            ],
            [
                'name' => 'schools_edit',
                'section_name' => 'schools',
                'description' => 'Schools Edit',
            ],
            [
                'name' => 'schools_delete',
                'section_name' => 'schools',
                'description' => 'Schools Delete',
            ],


            //providers

            [
                'name' => 'providers_menu',
                'section_name' => 'providers',
                'description' => 'Providers Menu',
            ],
            [
                'name' => 'providers_create',
                'section_name' => 'providers',
                'description' => 'Providers Create',
            ],
            [
                'name' => 'providers_edit',
                'section_name' => 'providers',
                'description' => 'Providers Edit',
            ],
            [
                'name' => 'providers_delete',
                'section_name' => 'providers',
                'description' => 'Providers Delete',
            ],


            //voters

            [
                'name' => 'voters_menu',
                'section_name' => 'voters',
                'description' => 'Voters Menu',
            ],
            [
                'name' => 'voters_create',
                'section_name' => 'voters',
                'description' => 'Voters Create',
            ],
            [
                'name' => 'voters_edit',
                'section_name' => 'voters',
                'description' => 'Voters Edit',
            ],
            [
                'name' => 'voters_delete',
                'section_name' => 'voters',
                'description' => 'Voters Delete',
            ],
        ];

        DB::table('permission_role')->delete();
        DB::table('permissions')->delete();
        Permission::insert($permissions);

        // Attach All Created Permissions to the Super Admin Role
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            Role::find(1)->permissions()->attach($permission->id);
        }
    }
}
