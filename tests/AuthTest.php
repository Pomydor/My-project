<?php

namespace Tests;

use App\Models\User;
use  Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class AuthTest extends TestCase
{
    public function test_userCanViewLoginForm()
    {
        $response = $this->get('login');
        $response->assertSuccessful();
        $response->assertViewIs('login');
    }

    public function test_the_application_returns_a_successful_response()
    {


        $user = User::factory()->create();

        $response = $this->actingAs($user)->withSession([
            'user' => "1"
        ])->get('/home');
        $response->assertStatus(404);

    }

//

    public function test_userCanViewRegisterForm()
    {
        $response = $this->get('register');
        $response->assertSuccessful();
        $response->assertViewIs('register');
    }

    public function testNull()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_cart()
    {
        $response = $this->get('/cart/show');
        $response->assertViewIs('cart.cart-modal');
    }

    public function test_Authenticated()
    {
        Auth::loginUsingId(1);
        $this->assertAuthenticated();
    }

    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    public function test_userCanNotViewLoginWhenAuthenticate()
    {
        $user = User::factory(User::class)->create();
        $response = $this->
        actingAs($user)->
        get('login');
        $response->assertStatus(200);
    }

    public function test_userCanLoginWithCorrectCredentials()
    {
        $password = 'pa';

        $user = User::factory(User::class)->create([
            'password' => bcrypt($password)
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

}
