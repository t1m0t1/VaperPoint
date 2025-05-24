<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles= 
        [
            ['name' => 'Admin'],
            ['name' => 'Vendedor']
        ];

        $permissions = 
        [
            'configuracion' =>
            [
                [['name' => 'configuracion.user'],
                    [
                        ['name' => 'configuracion.user.listar'],
                        ['name' => 'configuracion.user.alta'],
                        ['name' => 'configuracion.user.baja'],
                        ['name' => 'configuracion.user.modificacion'],
                    ]
                ],
                [['name' => 'configuracion.producto'],
                    [
                        ['name' => 'configuracion.producto.listar'],
                        ['name' => 'configuracion.producto.alta'],
                        ['name' => 'configuracion.producto.baja'],
                        ['name' => 'configuracion.producto.modificacion'],
                    ]
                ],
                [['name' => 'configuracion.categoria' ],
                    [
                        ['name' => 'configuracion.producto.listar'],
                        ['name' => 'configuracion.producto.alta'],
                        ['name' => 'configuracion.producto.baja'],
                        ['name' => 'configuracion.producto.modificacion'],
                    ]
                ]
            ]
        ];

        foreach ($roles as $role) {
            $rol = Role::where('name', $role['name'])->first();
            if (!$rol) {
                $rol = Role::create($role);
            }
            switch ($rol->name) {
                case 'Admin':
                    $permisos = $permissions['configuracion'];
                    foreach ($permisos as $permiso) {
                        if ($permiso[0]) {
                            $per = Permission::where('name',$permiso[0]['name'])->first();
                            if (!$per) {
                                $per = Permission::create($permiso[0]);
                            }
                            if ($permiso[1]) {
                                foreach ($permiso[1] as $permiso) {
                                    $per = Permission::where('name',$permiso['name'])->first();
                                    if (!$per) {
                                        $per = Permission::create($permiso);
                                    }
                                }
                            }
                        }
                    }
                break;
            }
        }


    }
}
