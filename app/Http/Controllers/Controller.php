<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SoapClient;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function zanibalWSDL()
    {
        return new SoapClient('https://zanibal.cardinalstone.com/ebclient/services/MobileClientService?wsdl', array("trace" => 1, "exceptions" => 1, "login" => 'cardinal_portal', "password" => 'oYLvArku%75'));
    }
}


