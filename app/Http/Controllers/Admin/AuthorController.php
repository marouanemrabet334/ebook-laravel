<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AuthorController extends Controller
{

    public function AllAuthor()
    {
        $authors = Author::latest()->get();
        return view('admin.authors.author_view', compact('authors'));
    }




    public function AuthorStore(Request $request)
    {

        $validateData = $request->validate([

            'author_name_ar' => 'required',
            'about_author' => 'required',
        ], [
            'author_name_ar.required' => 'Input Author Arabic Name',
            'about_author.required' => 'Input About Author',

        ]);

        $image = $request->file('author_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(600, 600)->save('upload/authorImage/' . $name_gen);
        $save_url = 'upload/authorImage/' . $name_gen;

        Author::insert([
            'author_name_ar' => $request->author_name_ar,
            'author_image' => $save_url,
            'about_author' => $request->about_author,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Author Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //



    public function AuthorEdit($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.authors.author_edit', compact('author'));
    }



    public function AuthorUpdate(Request $request)
    {

        $cat_id = $request->id;

        $old_img = $request->old_image;

        if ($request->file('author_image')) {


            unlink($old_img);

        $image = $request->file('author_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(600, 600)->save('upload/authorImage/' . $name_gen);
        $save_url = 'upload/authorImage/' . $name_gen;

            Author::findOrFail($cat_id)->update([
                'author_name_ar' => $request->author_name_ar,
                'author_image' => $save_url,
                'about_author' => $request->about_author,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Author Updated with Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.author')->with($notification);
        } else {

            Author::findOrFail($cat_id)->update([
                'author_name_ar' => $request->author_name_ar,
                'about_author' => $request->about_author,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Author Updated without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.author')->with($notification);
        } // end Else

    } // End Method



    public function AuthorDelete($id)
    {

        $author = Author::findOrFail($id);
        $img = $author->author_image;
        unlink($img);

        Author::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Author Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
