<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    protected $_userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->_userRepository = $userRepository;
    }

    public function show()
    {
        $user = $this->_userRepository->getAll();

        return response()->json([
            'data' => $user,
        ], Response::HTTP_OK);
    }

    public function store(RegisterRequest $request)
    {
        $user = $this->_userRepository->createUser($request);
        if ($user) {
            return response()->json($user, Response::HTTP_CREATED);
        }

        return response()->json(Response::HTTP_BAD_REQUEST);
    }

    public function showInfo($id)
    {
        $user = $this->_userRepository->find($id);

        return response()->json($user, Response::HTTP_OK);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->_userRepository->updateUser($request, $id);
        if ($user) {
            return response()->json($user, Response::HTTP_OK);
        }

        return response()->json(Response::HTTP_BAD_REQUEST);
    }

    public function delete($id)
    {
        $this->_userRepository->delete($id);

        return Response::HTTP_OK;
    }

}
