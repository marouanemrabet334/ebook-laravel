<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;



class CategoryController extends Controller
{
    //

    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('admin.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {

        $validateData = $request->validate([

            'category_name_ar' => 'required',
            'category_image' => 'required',
            'category_icon' => 'required',
        ], [

            'category_name_ar.required' => 'Input Category Arabic  Name',
            'category_icon.required' => 'Input Category Icon',

        ]);

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1020, 519)->save('upload/category/' . $name_gen);
        $save_url = 'upload/category/' . $name_gen;

        Category::insert([

            'category_name_ar' => $request->category_name_ar,
            'category_image' => $save_url,
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit', compact('category'));
    }
    public function CategoryUpdate(Request $request)
    {

        $cat_id = $request->id;

        $old_img = $request->old_image;

        if ($request->file('category_image')) {


            unlink($old_img);
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020, 519)->save('upload/category/' . $name_gen);
            $save_url = 'upload/category/' . $name_gen;

            Category::findOrFail($cat_id)->update([
                'category_name_ar' => $request->category_name_ar,
                'category_image' => $save_url,
                'category_icon' => $request->category_icon,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Category Updated with Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.category')->with($notification);
        } else {

            Category::findOrFail($cat_id)->update([

                'category_name_ar' => $request->category_name_ar,
                'category_icon' => $request->category_icon,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Category Updated without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.category')->with($notification);
        } // end Else

    } // End Method



    public function CategoryDelete($id)
    {

        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryActive($id){
        Category::findOrFail($id)->update(['status' => 1]);
           $notification = array(
              'message' => 'Category Active',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

       }


    public function CategoryInactive($id){
        Category::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Category Inactive',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}