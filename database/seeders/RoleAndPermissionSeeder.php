<?php

namespace Database\Seeders;

use App\Models\Permision;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'approve supplier']);
        Permission::create(['name' => 'reject supplier']);
        Permission::create(['name' => 'delete supplier']);
        Permission::create(['name' => 'create supplier']);

        // create permissios
        $createProduct = 'create product';
        $updateProduct = 'update product';
        $editProduct = 'edit product';
        $deleteProduct = 'delete product';
        Permission::create(['name' => $createProduct]);
        Permission::create(['name' => $updateProduct]);
        Permission::create(['name' => $editProduct]);
        Permission::create(['name' => $deleteProduct]);


        // roles
        $superAdmin='super-admin';
        $Admin='admin';
        $Supplier='supplier';
        $customer='customer';
        Role::create(['name'=>$superAdmin])->givePermissionTo(Permission::all());
        Role::create(['name'=>$Admin]);
        Role::create(['name'=>$Supplier])->givePermissionTo([
            $createProduct,
            $editProduct,
            $deleteProduct,
            $updateProduct
        ]);
        Role::create(['name'=>$customer]);
    }
}
