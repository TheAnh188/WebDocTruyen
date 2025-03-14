<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\AuthRequest;
use App\Http\Requests\V1\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

class AuthController extends Controller
{
    protected $userService;
    protected $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }


    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $accessToken = $user->createToken('access_token', ['*'], now()->addDay());
            return response()->json([
                'message' => 'Đăng nhập thành công',
                'user' => $user,
                'access_token' => $accessToken
            ], 200);
        }

        return response()->json([
            'message' => 'Email hoặc mật khẩu không chính xác'
        ], 401);
    }

    public function register(StoreUserRequest $request)
    {
        try {
            $this->userService->create($request);
            return response()->json([
                'message' => 'Tạo thành công',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
