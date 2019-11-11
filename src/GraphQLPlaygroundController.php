<?php

declare(strict_types=1);

namespace MLL\GraphQLPlayground;

class GraphQLPlaygroundController
{
    public function __invoke()
    {
        return view('graphql-playground::index');
    }
}
