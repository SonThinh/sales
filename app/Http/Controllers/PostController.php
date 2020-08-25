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
    )
    {
        $this->_postRepository = $postRepository;
    }

    public function show()
    {
        $post = $this->_postRepository->getAll();
        return response()->json($post, Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return response()->json($post, Response::HTTP_CREATED);
    }

    public function showDetail(Request $request, $id)
    {
        $post = $this->_postRepository->find($id);
        return response()->json($post, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $post = $this->_postRepository->find($id);
        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        return response()->json($post, Response::HTTP_OK);
    }

    public function delete($id)
    {
        $this->_postRepository->destroy($id);
        return Response::HTTP_OK;
    }
}
