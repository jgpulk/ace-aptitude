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
        $session = \Config\Services::session();
        $activeSessions = $session->get();
        echo "Active Sessions:<pre>";
        print_r($activeSessions);
        echo "</pre>";
    }
}
