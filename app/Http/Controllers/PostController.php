<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        dd($request->all());
    }

    public function showDetail(Request $request, $id)
    {
        dd($request->all());
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    public function delete(Request $request)
    {
        dd($request->all());
    }
}
