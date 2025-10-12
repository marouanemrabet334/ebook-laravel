<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    use FileUploadTrait;
    public function AllAuthor()
    {
        $authors = Author::latest()->get();
        return view('admin.authors.index', compact('authors'));
    }




    public function AuthorStore(Request $request)
    {

        $validateData = $request->validate([

            'author_name' => 'required',
            'about_author' => 'required',
        ], [
            'author_name.required' => 'Input Author Arabic Name',
            'about_author.required' => 'Input About Author',

        ]);

        $imageName = $this->uploadFile($request, 'author_image',  null, '/authors');

        $author = new Author();
        $author->author_name = $request->author_name;
        $author->author_image  = $imageName ?? $request->author_image;
        $author->about_author  = $request->about_author;
        $author->created_at  = Carbon::now();
        $author->save();

        $notification = array(
            'message' => 'Author Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    public function AuthorEdit($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }



    public function AuthorUpdate(Request $request, string $id)
    {

        $author = Author::findOrFail($id);

        $imageName = $this->uploadFile($request, 'author_image', $author->author_image, '/authors');

        $author->update([
            'author_name' => $request->author_name,
            'author_image' => $imageName,
            'about_author' => $request->about_author,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Author Updated with Image Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('author.index')->with($notification);
    } // End Method



    public function AuthorDelete($id)
    {



        $author = Author::findOrFail($id);
        Storage::disk('public_uploads')->delete($author->author_image);

        $author->delete();

        $notification = array(
            'message' => 'Author Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
