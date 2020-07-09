<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function responseOk($data = [])
    {
        return response()
            ->json(['success' => true, 'data' => $data], 200);
    }


    public function ThrowException($message)
    {
        $error = new Exception($message, 422);

        throw $error;
    }

    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }
}
