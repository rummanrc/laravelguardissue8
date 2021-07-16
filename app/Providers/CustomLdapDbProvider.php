<?php


namespace App\Providers;
use Adldap\Laravel\Auth\DatabaseUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;


class CustomLdapDbProvider extends DatabaseUserProvider
{
    public function retrieveById($identifier)
    {
        //$asd = Auth::guard('admin')->check();
        $route = explode('/',Route::current()->uri);
        $role = auth()->payload()->get('role');

        if ($route[1]=='employee' && $role == 'employee')
            return $this->eloquent->retrieveById($identifier);
        else
            return null;
    }
}
