<?php

declare(strict_types=1);

namespace MLL\GraphQLPlayground;

use Illuminate\Routing\Controller;

class GraphQLPlaygroundController extends Controller
{
    public function get()
    {
        return view('graphql-playground::index');
    }
}
