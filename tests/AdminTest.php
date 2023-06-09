<?php

namespace Tests;

use Illuminate\Support\Facades\Auth;

class AdminTest extends TestCase
{
    public function test_adminId()
    {
        Auth::loginUsingId(1);
        $response = $this->get('admin');
        $response->assertSuccessful();
        $response->assertViewIs('admin');
    }
}
