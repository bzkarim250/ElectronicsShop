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

        // permissions
        $createSupplier = 'create supplier';
        $deleteSupplier = 'delete supplier';
        $rejectSupplier = 'reject supplier';
        $approveSupplier = 'approve supplier';

        $createProduct = 'create product';
        $updateProduct = 'update product';
        $editProduct = 'edit product';
        $deleteProduct = 'delete product';

        Permission::create(['name' => $approveSupplier]);
        Permission::create(['name' => $rejectSupplier]);
        Permission::create(['name' => $deleteSupplier]);
        Permission::create(['name' => $createSupplier]);
      
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
        Role::create(['name'=>$Admin]) -> givePermissionTo([
            $approveSupplier,
            $rejectSupplier,
            $createSupplier,
            $deleteSupplier,
            $createProduct,
            $editProduct,
            $deleteProduct,
            $updateProduct
        ]);
        Role::create(['name'=>$Supplier])->givePermissionTo([
            $createProduct,
            $editProduct,
            $deleteProduct,
            $updateProduct
        ]);
        Role::create(['name'=>$customer]);
    }
}
