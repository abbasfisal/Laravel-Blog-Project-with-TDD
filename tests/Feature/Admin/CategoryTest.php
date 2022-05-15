<?php

namespace Tests\Feature\Admin;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * none admin forbidden
     */
    public function test_none_admin_redirect()
    {
        $this->makeUserLogin();
        $data = Category::factory()
                        ->make()
                        ->toArray();
        $resp = $this->post(route('store.category.admin'), $data);
        $resp->assertForbidden();
    }

    /**
     * check route existence
     */
    public function test_create_new_category_route_exist()
    {
        $this->makeAdminlogin();
        $res = $this->get(route('new.category.admin'));
        $res->assertOk();
    }

    /**
     * check view existence
     */
    public function test_view_exist()
    {
        $this->makeAdminlogin();
        $res = $this->get(route('new.category.admin'));
        $res->assertViewIs('admin.category.create');
    }

    /**
     * check store route path for saving category existence
     */
    public function test_check_store_route_exist()
    {
        $this->makeAdminlogin();
        $res = $this->post(route('store.category.admin'));
    }

    /**
     * validation error check
     */
    public function test_validation_check()
    {
        $this->makeAdminlogin();
        $data = ['title' => ''];
        $res = $this->post(route('store.category.admin'), $data);
        $res->assertSessionHasErrors('title');
    }

    /**
     * validate title duplication
     */
    public function test_validation_duplicate_title()
    {
        $this->makeAdminlogin();

        $cat_data = Category::factory()
                            ->make();
        Category::query()
                ->create($cat_data->toArray());

        $res = $this->post(route('store.category.admin'), $cat_data->toArray());

        $res->assertSessionHasErrors('title');

    }

    /**
     * save category
     */
    public function test_save_unique_category()
    {
        $this->makeAdminlogin();

        $cat_data = Category::factory()
                            ->make();

        $res = $this->post(route('store.category.admin'), $cat_data->toArray());

        $this->assertEquals(1, Category::all()
                                       ->count());

        $res->assertRedirect(route('new.category.admin'))
            ->assertSessionHas('success' ,'new Category Created SuccessFully');

    }

    /*
     |------------------------------
     | private methods
     |------------------------------
     |
     |
     |
     */
    /**
     * make admin user type loged In
     */
    private function makeAdminlogin()
    {
        $user = User::factory()
                    ->admin()
                    ->create();
        $this->actingAs($user);
    }

    /**
     * make normall user type loged In
     */
    private function makeUserLogin()
    {
        $user = User::factory()
                    ->user()
                    ->create();
        $this->actingAs($user);
    }
}
