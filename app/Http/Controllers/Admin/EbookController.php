<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Author;
use App\Models\Admin\Category;
use App\Models\Admin\Ebook;
use App\Models\Admin\MultiFile;
use App\Models\Admin\SubCategory;
use App\Models\FileUp;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

use PhpParser\Parser\Multiple;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EbookController extends Controller
{
    //



    public function AllEbook()
    {


        $books = Ebook::latest()->get();
        return view('admin.ebook.ebook_all', compact('books'));
    }

    public function AddEbook()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $authors = Author::latest()->get();

        return view('admin.ebook.ebook_add', compact('categories','authors','subcategories'));
    }

    public function StoreEbook(Request $request)
    {
//        $image = $request->file('ebook_img');
//        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
//        Image::make($image)->resize(1200, 1794)->save('upload/ebookImage/' . $name_gen);
//        $save_url = 'upload/ebookImage/' . $name_gen;



        $product_id = Ebook::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'ebook_name_ar' => $request->ebook_name_ar,
            //'ebook_img' => $save_url,
            'ebook_img_url' => $request->ebook_img_url,
            'author_id' => $request->author_id,
            'pages' => $request->pages,
            'lang_ebook' => $request->lang_ebook,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_ar' => $request->long_descp_ar,
            'pdf_from_url' => $request->pdf_from_url,
            'hot_deals' => $request->hot_deals,
            'featured_slider' => $request->featured_slider,
            'special_offer' => $request->special_offer,
            'soon' => $request->soon,
            'status' => 1,
            'free' => $request->free,
            'rating' => 0,
            'created_at' => Carbon::now(),
        ]);
        $img_id =Ebook::find($product_id);
        $img_id->addMediaFromRequest('ebook_img')
            ->usingName($request->ebook_name_ar)
            ->toMediaCollection();

         $files = $request->file('pdf_from_local');

         foreach ($files as $file){
            $name = time() . rand(1, 100) . '.' . $file->extension();
            $file->move(public_path('upload/files/'), $name);
            $uploadPath = 'upload/files/' . $name;
             MultiFile::insert([
                         'ebook_id' => $product_id,
                         'file_name' => $uploadPath,
                         'created_at' => Carbon::now(),

                     ]);
         }
        $notification = array(
            'message' => 'Ebook Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ebook')->with($notification);
    } // end method




	public function EditEbook($id){

        $multiFiles = MultiFile::where('ebook_id',$id)->get();

		$categories = Category::latest()->get();

		$subcategory = SubCategory::latest()->get();

		$books = Ebook::findOrFail($id);
        $authors = Author::latest()->get();
		return view('admin.ebook.ebook_edit',compact('categories','subcategory','books','multiFiles','authors'));

	}

    public function EbookDataUpdate(Request $request){

		 $product_id = $request->id;

         Ebook::findOrFail($product_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'ebook_name_ar' => $request->ebook_name_ar,
            'ebook_img_url' => $request->ebook_img_url,
             'author_id' => $request->author_id,
            'pages' => $request->pages,
            'lang_ebook' => $request->lang_ebook,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_ar' => $request->long_descp_ar,
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

		return redirect()->route('all.ebook')->with($notification);


	}


    // end method
    public function EbookActiveFree($id){
        Ebook::findOrFail($id)->update(['free' => 1]);
           $notification = array(
              'message' => 'Ebook Active Free',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

       }


    public function EbookInactivePaid($id) {

        Ebook::findOrFail($id)->update(['free' => 0]);
        $notification = array(
           'message' => 'Ebook Paid ',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }

    public function EbookActive($id){
        
        Ebook::findOrFail($id)->update(['status' => 1]);
           $notification = array(
              'message' => 'Ebook Active',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

       }


    public function EbookInactive($id){
        Ebook::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Ebook Inactive',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }


    /// Multiple Image Update
	public function MultiFilesUpdate(Request $request)
    {
        $validateData = $request->validate([
            'pdf_from_local' => 'required',

        ],[
            'pdf_from_local.required'=> 'المرجوا رفع ملف جديد لتغيير الملف القديم بالجديد',


        ]);

        $files = $request->file('pdf_from_local');

        foreach ($files as $id =>  $file){
            $fileDel = MultiFile::findOrFail($id);
	    unlink($fileDel->file_name);
           $name = time() . rand(1, 100) . '.' . $file->extension();
           $file->move(public_path('upload/files/'), $name);
           $uploadPath = 'upload/files/' . $name;
            MultiFile::where('id',$id)->update([
                        'file_name' => $uploadPath,
                        'created_at' => Carbon::now(),

                    ]);
        }

	  // end foreach



       $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end mehtod

       //// Multi Image Delete ////
       public function MultiFileDelete($id)
       {
           $oldfile = MultiFile::findOrFail($id);
           unlink($oldfile->file_name);
           MultiFile::findOrFail($id)->delete();

           $notification = array(
               'message' => 'Ebook File Deleted Successfully',
               'alert-type' => 'success'
           );

           return redirect()->back()->with($notification);
       } // end method

        /// Product Main Thambnail Update ///
        public function ThambnailImageUpdate(Request $request)
        {
            $pro_id = $request->id;
            $oldImage = $request->old_img;
            unlink($oldImage);

            $image = $request->file('ebook_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/ebookImage/' . $name_gen);
            $save_url = 'upload/ebookImage/' . $name_gen;

            Ebook::findOrFail($pro_id)->update([
                'ebook_img' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Product Image Thambnail Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        } // end method


    public function index()
    {
        return view('admin.files');
    }
    public function filesUpload(Request $request)
    {

        $files = [];

        if ($request->hasFile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('upload/files/'), $name);

                $files[] = $name;
            }
        }
        $file = new FileUp();
        $file->filenames = $files;
        $file->save();


        return back()->with('success', 'File Uploaded');
    }

    public function EbookDelete($id)
    {
        $book = Ebook::findOrFail($id);
        unlink($book->ebook_img);
        Ebook::findOrFail($id)->delete();

        $images = MultiFile::where('ebook_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->file_name);
            MultiFile::where('ebook_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Ebook Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method
}
