<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UserController extends ApiBaseController
{

    protected $_userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->_userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user  = $this->_userRepository->getAll();

        return response()->json([
            'data' => $user,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RegisterRequest $request)
    {
        $user = $this->_userRepository->createUser($request);
        if ($user) {
            return response()->json($user, Response::HTTP_CREATED);
        }

        return response()->json(Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = $this->_userRepository->find($id);

        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->_userRepository->updateUser($request, $id);
        if ($user) {
            return response()->json($user, Response::HTTP_OK);
        }

        return response()->json(Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return int
     */
    public function destroy($id)
    {
        $this->_userRepository->destroy($id);

        return Response::HTTP_OK;
    }

}
