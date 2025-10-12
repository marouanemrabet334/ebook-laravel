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


class EbookFilesController extends Controller
{
    //
    use FileUploadTrait;



    /// Multiple Image Update
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pdf_from_local' => 'required',

        ], [
            'pdf_from_local.required' => 'المرجوا رفع ملف جديد لتغيير الملف القديم بالجديد',


        ]);

        $files = $request->file('pdf_from_local');

        foreach ($files as $id =>  $file) {
            $fileDel = EbookFile::findOrFail($id);
            unlink($fileDel->file_name);
            $name = time() . rand(1, 100) . '.' . $file->extension();
            $file->move(public_path('upload/files/'), $name);
            $uploadPath = 'upload/files/' . $name;
            EbookFile::where('id', $id)->update([
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
    public function deleteFile($id)
    {
        $oldfile = EbookFile::findOrFail($id);
        unlink($oldfile->file_name);
        EbookFile::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Ebook File Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

   
}