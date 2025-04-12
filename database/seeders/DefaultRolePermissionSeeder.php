<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Permission;
use App\Models\RolePermission;
use Database\Factories\FeatureFactory;
use Database\Factories\FeaturePermissionFactory;
use Database\Factories\PermissionFactory;
use Database\Factories\RoleFactory;
use Database\Factories\RolePermissionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultRolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roleFactory = new RoleFactory();
        $rolePermissionFactory = new RolePermissionFactory();
        $featurePermissionFactory = new FeaturePermissionFactory();

        //Features
        $basic_feature = ['user', 'role'];
        $log_feature = ['activity-log'];

        //Permissions
        $basic_permissions = ['view', 'create', 'update', 'delete', 'import', 'export', 'print'];
        $systemPermissions = ['install', 'uninstall', 'upload'];
        $vds_permissions = [$basic_permissions[0], $basic_permissions[3], ...$systemPermissions];
        $log_permissions = [$basic_permissions[0],$basic_permissions[5]];



        $rolesToCreate = ['Administrator'];

        //Create Features and Permissions
        $featurePermissionFactory->createFeatureWithPermissions($basic_feature, $basic_permissions);
        $featurePermissionFactory->createFeatureWithPermissions($log_feature, $log_permissions);
        //        $featurePermissionFactory->createFeatureWithPermissions($system, $vds_permissions);


        foreach ($rolesToCreate as $roleName) {
            $role = $roleFactory->createRoleIfNotExists($roleName);

            if ($roleName === 'Administrator') {
                $rolePermissionFactory->attachPermissions($role);
            }
        }
    }

}
