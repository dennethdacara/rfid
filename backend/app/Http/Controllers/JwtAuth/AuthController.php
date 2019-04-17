<?php

namespace App\Http\Controllers\JwtAuth;

use Illuminate\Http\Request;
use App\Http\Requests\JwtAuth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\User, App\Model\Shared\Role;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'school_id'   => 0,
            'role_id'     => Role::_ADMIN,
            'rfid_code'   => 0,
            'given_name'  => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name'   => $request->last_name,
            'username'    => 0,
            'email'       => $request->email,
            'password'    => $request->password,
        ]);

        return response()->json(['user' => $user]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function userDetails()
    {

        //return $token = auth()->tokenById(2);

        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        $user = auth('api')->user();
        $user->role_id === 1 ? $role = 'Master' : $role = 'Admin';
        $user->role = $role;
        return response()->json($user);
    }

    public function logout()
    {
        auth('api')->logout(true);
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user'         => $this->guard()->user(),
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 500
        ]);
    }

    public function guard(){
        return Auth::Guard('api');
    }

}
