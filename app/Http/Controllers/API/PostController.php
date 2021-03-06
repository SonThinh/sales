<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    protected $_postRepository;
    protected $_categoryRepository;

    public function __construct(
        PostRepository $postRepository,
        CategoryRepository $category_repository
    ) {
        $this->_postRepository     = $postRepository;
        $this->_categoryRepository = $category_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $posts = $this->_postRepository->getAll();
        $data  = [];

        foreach ($posts as $post) {
            array_push($data,
                (new PostTransformer())->transform($post, $request->curLocale));
        }

        return response()->json([
            'data' => $data,
        ], Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $post = $this->_postRepository->find($id);

        return response()->json($post, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request)
    {
        if ($request->cate) {
            $posts = $this->_postRepository->whereIn('category_id',
                $request->cate);
        } else {
            $posts = $this->_postRepository->getAll();
        }
        $data = [];

        foreach ($posts as $post) {
            array_push($data,
                (new PostTransformer())->transform($post,
                    $request->curLocale));
        }

        return response()->json([
            'data' => $data,
        ], Response::HTTP_OK);
    }

}
