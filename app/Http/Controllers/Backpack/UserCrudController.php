<?php

namespace TridentSDK\Http\Controllers\Backpack;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest;
use TridentSDK\Http\Requests\Backpack\UserStoreCrudRequest;
use TridentSDK\Http\Requests\Backpack\UserUpdateCrudRequest;

class UserCrudController extends CrudController
{

    public function setup()
    {
        $this->crud->setModel(config('backpack.permissionmanager.user_model'));
        $this->crud->setEntityNameStrings(trans('backpack::permissionmanager.user'), trans('backpack::permissionmanager.users'));
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->enableAjaxTable();

        $this->crud->setColumns([
            [
                'name' => 'username',
                'label' => trans('backpack::permissionmanager.name'),
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type' => 'email',
            ],
            [ 
                'label' => trans('backpack::permissionmanager.roles'), 
                'type' => 'select_multiple',
                'name' => 'roles', 
                'entity' => 'roles', 
                'attribute' => 'name', 
                'model' => config('laravel-permission.models.role'), 
            ],
            [ 
                'label' => trans('backpack::permissionmanager.extra_permissions'), 
                'type' => 'select_multiple',
                'name' => 'permissions', 
                'entity' => 'permissions', 
                'attribute' => 'name', 
                'model' => config('laravel-permission.models.permission'), 
            ],
        ]);

        $this->crud->addFields([
            [
                'name' => 'username',
                'label' => trans('backpack::permissionmanager.name'),
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type' => 'email',
            ],
            [
                'name' => 'password',
                'label' => trans('backpack::permissionmanager.password'),
                'type' => 'password',
            ],
            [
                'name' => 'password_confirmation',
                'label' => trans('backpack::permissionmanager.password_confirmation'),
                'type' => 'password',
            ],
            [
                
                'label' => trans('backpack::permissionmanager.user_role_permission'),
                'field_unique_name' => 'user_role_permission',
                'type' => 'checklist_dependency',
                'name' => 'roles_and_permissions', 
                'subfields' => [
                    'primary' => [
                        'label' => trans('backpack::permissionmanager.roles'),
                        'name' => 'roles', 
                        'entity' => 'roles', 
                        'entity_secondary' => 'permissions', 
                        'attribute' => 'name', 
                        'model' => config('laravel-permission.models.role'), 
                        'pivot' => true, 
                        'number_columns' => 3, 
                    ],
                    'secondary' => [
                        'label' => ucfirst(trans('backpack::permissionmanager.permission_singular')),
                        'name' => 'permissions', 
                        'entity' => 'permissions', 
                        'entity_primary' => 'roles', 
                        'attribute' => 'name', 
                        'model' => "Backpack\PermissionManager\app\Models\Permission", 
                        'pivot' => true, 
                        'number_columns' => 3, 
                    ],
                ],
            ],
        ]);
    }

    public function store(UserStoreCrudRequest $request)
    {
        $this->handlePasswordInput($request);

        return parent::storeCrud($request);
    }
    
    public function update(UserUpdateCrudRequest $request)
    {
        $this->handlePasswordInput($request);

        return parent::updateCrud($request);
    }

    protected function handlePasswordInput(CrudRequest $request)
    {
        $request->request->remove('password_confirmation');

        if ($request->input('password')) {
            $request->request->set('password', bcrypt($request->input('password')));
        } else {
            $request->request->remove('password');
        }
    }

}