<?php

namespace App\Repositories\Roles;

interface RoleInterface
{
    public function getRoleName();

    public function getRolePermission();
}
