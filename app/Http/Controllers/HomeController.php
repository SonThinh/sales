<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    protected $_postRepository;
    protected $_userRepository;

    function __construct(
        PostRepository $postRepository,
        UserRepository $userRepository
    ) {
        $this->_postRepository = $postRepository;
        $this->_userRepository = $userRepository;
    }

    public function index()
    {
        return view('welcome');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function showEditUser($id)
    {
        $data['user'] = $this->_userRepository->find($id);

        return view('edit_user', $data);
    }

    public function showDeleteUser($id)
    {
        $data['user'] = $this->_userRepository->find($id);

        return view('delete_user', $data);
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status'  => 'true',
                'message' => 'Đăng nhập thành công',
                'url'     => route('home'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status'  => 'false',
                'message' => 'Sai tài khoản hoặc mật khẩu',
                'url'     => route('view.login'),
            ], Response::HTTP_OK);
        }
    }

}
