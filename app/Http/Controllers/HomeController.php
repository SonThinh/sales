<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
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
        $data['posts'] = $this->_postRepository->paginate(5);

        return view('welcome', $data);
    }

    public function showLogin()
    {
        return view('login');
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('home', app()->getLocale());
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status'  => 'true',
                'message' => trans('message.login_success'),
                'url'     => route('home', app()->getLocale()),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status'  => 'false',
                'message' => trans('message.login_fail'),
                'url'     => route('view.login', app()->getLocale()),
            ], Response::HTTP_OK);
        }
    }

}
