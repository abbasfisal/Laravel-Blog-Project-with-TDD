<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCategoryRequest;
use App\Http\Requests\CreateWriterRequest;
use App\Http\Requests\ListWriterRequest;
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
}
