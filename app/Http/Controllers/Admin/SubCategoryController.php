<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    //

    public function GetSubCategory($category_id)
    {

        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }

    public function SubCategoryView()
    {

        $categories = Category::orderBy('category_name_ar', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.category.subcategory_view', compact('subcategory', 'categories'));
    }


    public function SubCategoryStore(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'subcategory_name_ar' => 'required',
            'subcategory_image' => 'required',
        ], [
            'category_id.required' => 'Please select Any option',
            'subcategory_name_ar.required' => 'Input SubCategory Arabic Name',


        ]);



        $image = $request->file('subcategory_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(981, 654)->save('upload/subcategory/' . $name_gen);
        $save_url = 'upload/subcategory/' . $name_gen;

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_image' =>$save_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method



    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_ar', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcategory_edit', compact('subcategory', 'categories'));
    }

    public function SubCategoryUpdate(Request $request)
    {

        $subcat_id = $request->id;

        $old_img = $request->old_image;
        if ($request->file('subcategory_image')) {

        unlink($old_img);
        $image = $request->file('subcategory_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(981, 654)->save('upload/subcategory/' . $name_gen);
        $save_url = 'upload/subcategory/' . $name_gen;


        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    } else {

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated without Image Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    } // end Else
    }  // end method



    public function SubCategoryDelete($id)
    {

        $subcategory = Category::findOrFail($id);
        $img = $subcategory->subcategory_image;
        unlink($img);

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}
