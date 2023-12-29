<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Test extends BaseController
{
    public function index()
    {
        echo "Test controller";
    }

    public function getSession(){
        echo "Active Sessions:<pre>";
        print_r(session()->get());
        echo "</pre>";
    }

    public function destroySession(){
        session()->destroy();
        echo "Session destroyed. Current session data<br>";
        echo "<pre>";
        print_r(session()->get());
        echo "</pre>";
    }
}
