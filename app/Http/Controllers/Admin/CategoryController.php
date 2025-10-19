<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    use FileUploadTrait;
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([

            'category_name' => 'required',
            'category_image' => 'required',
            'category_icon' => 'required',
        ], [

            'category_name.required' => 'Input Category   Name',
            'category_icon.required' => 'Input Category Icon',

        ]);

        $imageName =   $this->uploadFile($request, 'category_image',  null, '/categories');

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_image = $imageName ?? $request->category_image;
        $category->category_icon = $request->category_icon;
        $category->status = 1;
        $category->save();

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $imageName = $this->uploadFile($request, 'category_image', $category->category_image, '/categories');

        $category->update([
            'category_name' => $request->category_name,
            'category_image' =>  $imageName,
            'category_icon' => $request->category_icon,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated with Image Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.category.index')->with($notification);
    } // End Method



    public function delete($id)
    {

        $category = Category::findOrFail($id);
        Storage::disk('public_uploads')->delete($category->category_image);

        $category->delete();

        $notification = array(
            'message' => 'Category ID: {$id}  has been Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Category::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Category Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inactive($id)
    {
        Category::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Category Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
