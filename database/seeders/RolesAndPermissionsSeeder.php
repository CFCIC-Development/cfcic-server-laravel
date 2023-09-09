<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::truncate();
        Role::truncate();

        // Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // USERS
        $userPermission1 = Permission::create(['name' => 'create: user']);
        $userPermission2 = Permission::create(['name' => 'read: user']);
        $userPermission3 = Permission::create(['name' => 'update: user']);
        $userPermission4 = Permission::create(['name' => 'delete: user']);

        // ROLES
        $createRole = Permission::create(['name' => 'create role']);
        $readRole = Permission::create(['name' => 'view role']);
        $updateRole = Permission::create(['name' => 'edit role']);
        $deleteRole = Permission::create(['name' => 'delete role']);

        // ROLESPERMISSION
        $createPermission = Permission::create(['name' => 'create permission']);
        $readPermission = Permission::create(['name' => 'view permission']);
        $updatePermission = Permission::create(['name' => 'edit permission']);
        $deletePermission = Permission::create(['name' => 'delete permission']);

        // CREATE AND ATTACH PERMISSIONS
        $createrequisition = Permission::create(['name' => 'create requisition']);
        $readrequisition = Permission::create(['name' => 'view requisitions']);
        $updaterequisition = Permission::create(['name' => 'edit requisition']);
        $deleterequisition = Permission::create(['name' => 'delete requisition']);
        $processrequisition = Permission::create(['name' => 'process requisition']);

        $makeservicedataentry = Permission::create(['name' => 'make service data entry']);
        $makechildrenchurchdataentry = Permission::create(['name' => 'make children church data entry']);
        $managecells = Permission::create(['name' => 'manage cells']);
        $viewallattendance = Permission::create(['name' => 'view all attendance']);
        $viewownattendance = Permission::create(['name' => 'view own attendance']);
        $viewallfinances = Permission::create(['name' => 'view all finances']);
        $viewownfinances = Permission::create(['name' => 'view own finances']);

        $viewallchurches = Permission::create(['name' => 'view all churches']);
        $viewownchurch = Permission::create(['name' => 'view own church']);

        $generatereports = Permission::create(['name' => 'generate reports']);

        // SUPER-USER
        $userRole = Role::create(['name' => 'user'])->syncPermissions([
            $miscPermission,
        ]);
        $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $createRole,
            $readRole,
            $updateRole,
            $deleteRole,
            $createPermission,
            $readPermission,
            $updatePermission,
            $deletePermission,
            $createrequisition,
            $readrequisition,
            $updaterequisition,
            $deleterequisition,
            $processrequisition,
            $makeservicedataentry,
            $makechildrenchurchdataentry,
            $managecells,
            $viewallattendance,
            $viewownattendance,
            $viewallfinances,
            $viewownfinances,
            $viewallchurches,
            $viewownchurch,
            $generatereports,
        ]);
        $developerRole = Role::create(['name' => 'developer'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
        ]);
        $generaloverseer = Role::create(['name' => 'generaloverseer'])->syncPermissions([
            $readrequisition,
            $updaterequisition,
            $deleterequisition,
            $processrequisition,
            $makeservicedataentry,
            $makechildrenchurchdataentry,
            $managecells,
            $viewallattendance,
            $viewownattendance,
            $viewallfinances,
            $viewownfinances,
            $viewallchurches,
            $viewownchurch,
            $generatereports,
        ]);
        $coordinatorchurches = Role::create(['name' => 'coordinatorchurches'])->syncPermissions([
            $readrequisition,
            $updaterequisition,
            $deleterequisition,
            $processrequisition,
            $makeservicedataentry,
            $makechildrenchurchdataentry,
            $managecells,
            $viewallattendance,
            $viewownattendance,
            $viewallfinances,
            $viewownfinances,
            $viewallchurches,
            $viewownchurch,
            $generatereports,
        ]);
        $residentpastor = Role::create(['name' => 'residentpastor'])->syncPermissions([
            $readrequisition,
            $updaterequisition,
            $deleterequisition,
            $processrequisition,
            $makeservicedataentry,
            $makechildrenchurchdataentry,
            $managecells,
            $viewownattendance,
            $viewownfinances,
            $viewownchurch,
        ]);
        $associatepastor = Role::create(['name' => 'associatepastor'])->syncPermissions([
            $readrequisition,
            $updaterequisition,
            $processrequisition,
            $makeservicedataentry,
            $makechildrenchurchdataentry,
            $managecells,
            $viewownattendance,
            $viewownfinances,
            $viewownchurch,
        ]);
        $secretary = Role::create(['name' => 'secretary'])->syncPermissions([
            $readrequisition,
            $updaterequisition,
            $makeservicedataentry,
            $makechildrenchurchdataentry,
            $viewownattendance,
            $viewownfinances,
            $viewownchurch,
            $viewallchurches,
            $generatereports,
        ]);
        $treasurer = Role::create(['name' => 'treasurer'])->syncPermissions([
            $readrequisition,
            $viewownfinances,
            $viewownchurch,
        ]);

        $registrationteam = Role::create(['name' => 'registration-team'])->syncPermissions([
            $readrequisition,
            $viewownfinances,
            $viewownchurch,
        ]);

        // CREATE ADMINS & USERS
        User::create([
            'name'              => 'Umaha Tokula',
            'email'             => 'umahatokula@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('Snow1507'),
            'remember_token'    => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create([
            'name'              => 'Esther Eche',
            'email'             => 'myesther97@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ])->assignRole($registrationteam);

    }
}
