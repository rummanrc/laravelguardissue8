<?php


namespace App\Providers;
use Adldap\Laravel\Auth\DatabaseUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class CustomLdapDbProvider extends DatabaseUserProvider
{
    public function retrieveById($identifier)
    {
        //$asd = Auth::guard('admin')->check();
        $asd = explode('/',Route::current()->uri);
        if ($asd[1]=='employee')
            return $this->eloquent->retrieveById($identifier);
    }
}
