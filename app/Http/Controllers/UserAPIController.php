<?php
/**
 * Created by PhpStorm.
 * User: AlexChervon
 * Date: 02.10.2019
 * Time: 15:58
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Auth;
use Exception;

/**
 * Class UserAPIController
 * @package App\Http\Controllers\API
 */
class UserAPIController extends Controller
{

    /**
     * Sign in account
     * @param Request $request
     * @return mixed
     * @throws Exception
     *
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            $this->ThrowException('User not found');
        }

        return $this->responseOk($token);
    }

}