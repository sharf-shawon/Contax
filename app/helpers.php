<?php

use Illuminate\Support\Facades\Auth;

function checkPermission($permission = null)
{
    if(!$permission)
    {
        $caller = debug_backtrace()[1];
        $function = $caller['function'];
        switch ($function) {
            case 'update':
            $function = 'edit';
            break;
            case 'store':
            $function = 'create';
            break;
            case 'destroy':
            $function = 'delete';
            break;
        }
        $class = str_replace('Controller', '', substr($caller['class'], strrpos($caller['class'], '\\') + 1));
        $permission = strtolower($class . '.' . $function);
    }

    if(Auth::user()->cannot($permission))
        abort(403);

}
