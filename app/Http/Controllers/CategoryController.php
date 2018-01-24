<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $count = $categories->count();
        return view('admin.category_listing', ['categories' => $categories, 'count' => $count]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('name')) {
            $category = new Category;

            $name = $request->name;

            $filename = basename($_FILES['image']['name']);

            if ($filename != '') {
                $category->category_image = $filename;
                //category_images
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/category_images/' . $filename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {

                } else {
                    Session::flash('noimage', 'Image not uploded');
                }
            } else {
                $category->category_image = 'law.jpg';
            }

            if ($request->has('description')) {
                $category->description = $request->description;
            }

            $category->name = $name;
            $category->save();
            return redirect('admin/categories');
        } else {
            return redirect('admin/categories');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('admin.edit_category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        $filename = basename($_FILES['image']['name']);
        if ($filename != '') {
            $category->category_image = $filename;
            $target_path = $_SERVER['DOCUMENT_ROOT'] . '/category_images/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        }

        $category->save();

        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('admin/categories');
    }

    public function addcategory()
    {
        return view('admin.add_category');
    }
}
