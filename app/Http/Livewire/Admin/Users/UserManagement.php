<?php

namespace App\Http\Livewire\Admin\Users;

use App\Helper;
use App\Repositories\User\UserInterface;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserManagement extends Component
{

    public $rolesModel, $permissionModel, $assignPermissions;

    public $modelKey, $roles, $permissions, $user;

    public $isModalEditRole = false;

    public function mount()
    {
        $this->rolesModel = Config::get('laratrust.models.role');
        $this->permissionModel = Config::get('laratrust.models.permission');
        $this->assignPermissions = Config::get('laratrust.panel.assign_permissions_to_user');
    }

    public function render()
    {
        $modelsKeys = array_keys(Config::get('laratrust.user_models'));
        $userModel = Config::get('laratrust.user_models')[$modelsKeys[0]] ?? null;
        if (!$userModel) {
            abort(404);
        }
        return view('livewire.admin.users.user-management', [
            'models' => $modelsKeys,
            'users' => $userModel::query()
                ->withCount(['roles', 'permissions'])
                ->simplePaginate(10),
        ]);
    }
    public function edit($modelId)
    {
        $this->isModalEditRole = true;
        $userModel = Config::get('laratrust.user_models') ?? null;
        if (!$userModel) {
            Session::flash('laratrust-error', 'Model was not specified in the request');
        }

        $user = $userModel['users']::query()
            ->with(['roles:id,name', 'permissions:id,name'])
            ->findOrFail($modelId);

        $this->roles = $this->rolesModel::orderBy('name')->get(['id', 'name', 'display_name'])
            ->map(function ($role) use ($user) {
                $role->assigned = $user->roles
                    ->pluck('id')
                    ->contains($role->id);
                $role->isRemovable = Helper::roleIsRemovable($role);

                return $role;
            });
        // dd($roles);
        if ($this->assignPermissions) {
            $permissions = $this->permissionModel::orderBy('name')
                ->get(['id', 'name', 'display_name'])
                ->map(function ($permission) use ($user) {
                    $permission->assigned = $user->permissions
                        ->pluck('id')
                        ->contains($permission->id);

                    return $permission;
                });
        }
        $this->permissions = $this->assignPermissions ? $permissions : null;
        $this->user = $user;
    }
    public function closeModalEdit()
    {
        $this->isModalEditRole = false;
    }
}
