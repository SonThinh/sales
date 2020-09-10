<?php

namespace App\Http\Controllers;

use App\Model\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    protected $_postRepository;

    public function __construct(
        PostRepository $postRepository
    ) {
        $this->_postRepository = $postRepository;
    }

    public function show()
    {
        $post = $this->_postRepository->getAll();

        return response()->json($post, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $post = $this->_postRepository->createPost($request);
        if ($post) {
            return response()->json($post, Response::HTTP_CREATED);
        }

        return response()->json(Response::HTTP_BAD_REQUEST);

    }

    public function showDetail(Request $id)
    {
        $post = $this->_postRepository->find($id);

        return response()->json($post, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $post = $this->_postRepository->updatePost($request, $id);
        if ($post) {
            return response()->json($post, Response::HTTP_OK);
        }

        return response()->json(Response::HTTP_BAD_REQUEST);
    }

    public function delete($id)
    {
        $this->_postRepository->destroy($id);

        return Response::HTTP_OK;
    }

}
