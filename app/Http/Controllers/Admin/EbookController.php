<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Author;
use App\Models\Admin\Category;
use App\Models\Admin\Ebook;
use App\Models\Admin\EbookFile;
use App\Models\Admin\SubCategory;
use App\Models\FileUp;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    //
    use FileUploadTrait;


    public function index()
    {


        $books = Ebook::with(['pdf', 'author'])
            ->where('status', true)
            ->get();

        return view('admin.ebook.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $authors = Author::latest()->get();

        return view('admin.ebook.create', compact('categories', 'authors', 'subcategories'));
    }

    public function store(Request $request)
    {

        $imgName = $this->uploadFile($request, 'ebook_img', null, '/ebooks');

        $ebook = new Ebook();
        $ebook->category_id      = $request->category_id;
        $ebook->subcategory_id   = $request->subcategory_id;
        $ebook->ebook_name       = $request->ebook_name;
        $ebook->ebook_img        = $imgName;
        $ebook->ebook_img_url    = $request->ebook_img_url;
        $ebook->author_id        = $request->author_id;
        $ebook->pages            = $request->pages;
        $ebook->lang_ebook       = $request->lang_ebook;
        $ebook->short_desc       = $request->short_desc;
        $ebook->long_desc        = $request->long_desc;
        $ebook->pdf_from_url     = $request->pdf_from_url;
        $ebook->hot_deals        = $request->hot_deals;
        $ebook->featured_slider  = $request->featured_slider;
        $ebook->special_offer    = $request->special_offer;
        $ebook->soon             = $request->soon;
        $ebook->status           = 1;
        $ebook->free             = $request->free;
        $ebook->rating           = 0;
        $ebook->created_at       = Carbon::now();
        $ebook->save();

        foreach ($request->file('pdf_from_local') as $file) {

            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = 'ebooks/files/' . $request->user()->id . '/' . $fileName;

            Storage::disk('public_uploads')->put(
                $path,
                file_get_contents($file)
            );

            $ebookFile = new EbookFile();
            $ebookFile->ebook_id        = $ebook->id;
            $ebookFile->file_path       = $path;
            $ebookFile->file_name       = $file->getClientOriginalName();
            $ebookFile->file_size       = $file->getSize();
            $ebookFile->file_type       = $file->getMimeType();
            $ebookFile->file_extension  = $file->getClientOriginalExtension();
            $ebookFile->created_at      = Carbon::now();
            $ebookFile->save();
        }
        $notification = array(
            'message' => 'Ebook Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ebook.index')->with($notification);
    } // end method

    public function edit($id)
    {

        $ebookFiles = EbookFile::where('ebook_id', $id)->get();

        $categories = Category::latest()->get();

        $subcategory = SubCategory::latest()->get();

        $books = Ebook::findOrFail($id);
        $authors = Author::latest()->get();
        return view('admin.ebook.edit', compact('categories', 'subcategory', 'books', 'ebookFiles', 'authors'));
    }

    public function update(Request $request, $id)
    {

        $ebook =  Ebook::findOrFail($id);
        $imgName = $this->uploadFile($request, 'ebook_img', $ebook->ebook_img, '/ebooks');

        $ebook->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'ebook_name' => $request->ebook_name,
            'ebook_img' => $imgName,
            'ebook_img_url' => $request->ebook_img_url,
            'author_id' => $request->author_id,
            'pages' => $request->pages,
            'lang_ebook' => $request->lang_ebook,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'pdf_from_url' => $request->pdf_from_url,
            'hot_deals' => $request->hot_deals,
            'featured_slider' => $request->featured_slider,
            'special_offer' => $request->special_offer,
            'soon' => $request->soon,
            'free' => $request->free,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Ebook Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ebook.index')->with($notification);
    }



    public function EbookActiveFree($id)
    {
        Ebook::findOrFail($id)->update(['free' => 1]);
        $notification = array(
            'message' => 'Ebook Active Free',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function EbookInactivePaid($id)
    {

        Ebook::findOrFail($id)->update(['free' => 0]);
        $notification = array(
            'message' => 'Ebook Paid ',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id)
    {

        Ebook::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Ebook Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function inactive($id)
    {
        Ebook::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Ebook Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $book = Ebook::findOrFail($id);

        $images = EbookFile::where('ebook_id', $id)->get();

        foreach ($images as $img) {
            Storage::disk('public_uploads')
                ->delete($img->file_path);
            $img->delete();
        }

        $book->delete();

        $notification = array(
            'message' => 'Ebook Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method
}