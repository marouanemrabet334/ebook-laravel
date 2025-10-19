<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    //
    use FileUploadTrait;
    public function GetSubCategory($category_id)
    {

        $subCat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subCat);
    }

    public function index()
    {

        $categories = Category::latest()->get();
       $subcategory = SubCategory::with('category')->latest()->get();
        return view('admin.category.subCategory.index', compact('subcategory', 'categories'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
            'subcategory_image' => 'required',
        ], [
            'category_id.required' => 'Please select Any option',
            'subcategory_name.required' => 'Input SubCategory Name',
        ]);

        $imageName = $this->uploadFile($request, 'subcategory_image',  null, '/subcategories');

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category_id;
        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->subcategory_image = $imageName;
        $subCategory->save();

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method



    public function edit($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subCategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $subCategory = SubCategory::findOrFail($id);

        $imageName = $this->uploadFile($request, 'subcategory_image', $subCategory->subcategory_image, '/subcategories');

        $subCategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_image' => $imageName,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.subcategory.index')->with($notification);
    }  // end method



    public function delete($id)
    {

        $subcategory = SubCategory::findOrFail($id);
        Storage::disk('public_uploads')->delete($subcategory->subcategory_image);

        $subcategory->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
