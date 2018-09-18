<?php

namespace MLL\GraphQLPlayground;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GraphQLPlaygroundController extends Controller
{
    public function get(Request $request)
    {
        return view('graphql-playground::index');
    }
}
