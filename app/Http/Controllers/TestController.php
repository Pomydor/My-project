<?php

namespace App\Http\Controllers;

class TestController
{
    public function store(Request $request)
    {
        if($request->header("ExampleHeader") != "Example")
        {
            abort(404);
        }
    }
}
