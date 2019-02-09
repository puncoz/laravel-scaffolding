<?php

use App\Data\Entities\Models\User\User;
use Illuminate\Contracts\Auth\Authenticatable;

if ( !function_exists('currentUser') ) {
    /**
     * @return Authenticatable|User|null
     */
    function currentUser()
    {
        return auth()->user();
    }
}
