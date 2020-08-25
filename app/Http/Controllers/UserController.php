<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $_userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->_userRepository = $userRepository;
    }

    public function show()
    {
        $user = $this->_userRepository->getAll();
        return response()->json($user, Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user, Response::HTTP_CREATED);
    }

    public function showInfo($id)
    {
        $user = $this->_userRepository->find($id);
        return response()->json($user, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $user = $this->_userRepository->find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response()->json($user, Response::HTTP_OK);
    }

    public function delete($id)
    {
        $this->_userRepository->destroy($id);
        return Response::HTTP_OK;
    }
}
