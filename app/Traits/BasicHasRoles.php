<?php
namespace App\Traits;

use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

trait BasicHasRoles
{
    use HasRoles;

    public function getRoleName()
    {
        return $this->roles->pluck('name')->first();
    }

    public function getRoleId()
    {
        return $this->roles->pluck('id')->first();
    }
}