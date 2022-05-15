<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCategoryRequest;
use App\Http\Requests\CreateWriterRequest;
use App\Http\Requests\ListWriterRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.index');
    }

    /*
     |------------------------------
     | Methods for Writer
     |------------------------------
     |
     |
     |
     */
    /*
     * Show form for creating a wirter
     *
     */
    public function newWriterForm()
    {
        return view('admin.writer.create');
    }

    /**
     * store new writer data into the database
     *
     */
    public function storeWriter(CreateWriterRequest $request)
    {
        User::query()
            ->create([
                User::col_name     => $request->name,
                User::col_email    => $request->email,
                User::col_password => Hash::make($request->name),
                User::col_type     => User::type_writer
            ]);

        return redirect(route('new.writer.admin'))->with('success', 'new Writer Created Successfully');
    }

    /**
     * show all writer
     */
    public function showWriterList(ListWriterRequest $request)
    {
        $writers = User::query()
                       ->where('type', 'writer')
                       ->paginate(2);
        return view('admin.writer.list', compact('writers'));

    }

    /**
     * show wirter posts
     *
     */
    public function showWriterPosts(User $user)
    {
        $writer = $user;
        return view('admin.writer.writerpostlists', compact('writer'));
    }

    /*
     |------------------------------
     | Methods for Category Model
     |------------------------------
     |
     |
     |
     */

    /**
     * show create category Form
     */
    public function newCategory()
    {
        return view('admin.category.create');
    }

    /**
     * Save a new Category
     *
     * @param createCategoryRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeNewCategory(createCategoryRequest $request)
    {
        $slug = SLUG($request->title);

        Category::query()
                ->create([
                    Category::col_title => $request->title,
                    Category::col_slug  => $slug
                ]);

        return redirect(route('new.category.admin'))
            ->with('success', 'new Category Created SuccessFully');

    }


    /**
     * show categires by paginate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCategoryList()
    {
        $categories = Category::query()
                              ->paginate(3);

        return view('admin.category.list', compact('categories'));
    }

    public function editCategory(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            Category::col_title => $request->title,
            Category::col_slug  => SLUG($request->title)
        ]);

        return redirect(route('list.category.admin'))->with('success','category updated successfully');
    }
}
