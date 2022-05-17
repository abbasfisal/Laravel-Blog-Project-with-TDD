<?php

namespace Tests\Feature\Auth;


use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * admin redirection after loged In
     *
     * @return void
     */
    public function test_redirect_admin_after_logedIn()
    {
        $admin = User::factory()
                     ->admin()
                     ->state([
                         'email' => 'admin@a.b', 'password' => Hash::make('1234')
                     ])
                     ->create();
        //credentials
        $data = ['email' => 'admin@a.b', 'password' => '1234'];

        //post
        $response = $this->post(route('login'), $data);

        //assertions
        $response->assertRedirect(route('dashboard.admin'));

    }

    /**
     * if credetional was incorrect
     */
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


    public function test_writer_logged_in_redirection()
    {
        $this->withoutExceptionHandling();

        //create a writer in db
        User::factory()
            ->writer()
            ->state([
                'email' => 'writer@a.b', 'password' => Hash::make('1234')
            ])
            ->create();


        $writer = [
            User::col_email    => 'writer@a.b',
            User::col_password => '1234'
        ];

        $resp = $this->post(route('login'), $writer);

        $resp->assertRedirect(route('dashboard.writer'));

        //TODO باید این تست درست در بیاد که بعد لاگین این ویو رو نشون بده
        //$resp->assertViewIs('writer.index');

    }


}
