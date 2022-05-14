<?php

namespace Tests\Feature\Auth;


use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_redirect_admin_after_logedIn()
    {
        //credentials
        $data = ['email' => 'admin@a.b', 'password' => '1234'];

        //post
        $response = $this->post(route('login'), $data);

        //assertions
        $response->assertRedirect(route('dashboard.admin'));

    }

    public function test_redirect_if_userName_or_passowrd_was_incorrect()
    {
        //credentials
        $data = ['email' => 'admin@a.bc', 'password' => '1234'];

        //post
        $response = $this->post(route('login'), $data);

        //assertions
        $response->assertSessionHas('email', 'User Name | Password Is Incorrect!');
        $response->assertRedirect(route('login'));

    }
}
