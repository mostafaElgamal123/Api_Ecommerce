<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Traits\{ApiResponse,ValidatorRequest};
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\{AuthCollection,AuthResource};

class AuthController extends Controller
{
    use ApiResponse;
    use ValidatorRequest;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),$this->ValidationLogin());
        if ($validator->fails()) {
            return $this->ResponseAuth('','','fail',422,$validator->errors());
        }else{
            $credentials = $request->only('email', 'password');
            $token = Auth::attempt($credentials);
            if (!$token) {
                return $this->ResponseAuth('',$token,'Unauthorized',401,'');
            }else{
                $user = Auth::user();
                return $this->ResponseAuth(new AuthResource($user),$token,'success',200,'');
            }
            
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),$this->Validationregister());
        if ($validator->fails()) {
            return $this->ResponseAuth('','','fail',422,$validator->errors());
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = Auth::login($user);
            return $this->ResponseAuth(new AuthResource($user),$token,'User created successfully',200);
        }
    }

    public function logout()
    {
        Auth::logout();
        return $this->ResponseAuth('','','Successfully logged out',200);
    }

    public function refresh()
    {
        return $this->ResponseAuth(new AuthResource(Auth::user()),'','',200);
    }
}