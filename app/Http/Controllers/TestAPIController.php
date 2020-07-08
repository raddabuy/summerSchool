<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPHtmlParser\Dom;
use Response;

/**
 * Class BusynessController
 * @package App\Http\Controllers\API
 */
class TestAPIController extends Controller
{
    /**
     * Get all types of busyness
     *
     * @param Request $request
     *
     * @return mixed
     * @see BusynessScheme::index()
     */
    public function test(Request $request)
    {
        return [
            'error' => [
                'code' => 200,
                'message' => 'done'
            ],
            'success' => true
        ];
    }


}
