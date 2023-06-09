<?php


use Tests\TestCase;

class AdminTest extends TestCase
{
    public function testAdminCanManageUsers()
    {
         Auth::loginUsingId(1);
        $response = $this->get('admin');
        $response->assertSuccessful();
        $response->assertViewIs('admin');
    }

}
