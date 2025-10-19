<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EbookFile;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;

class EbookFilesController extends Controller
{
    //
    use FileUploadTrait;



    /// Multiple File Update
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'pdf_from_local' => 'required|array',
            'pdf_from_local.*' => 'file|mimes:pdf|max:10240', // 10 MB max
        ], [
            'pdf_from_local.required' => 'المرجوا رفع ملف جديد لتغيير الملف القديم بالجديد',
        ]);

        foreach ($request->file('pdf_from_local') as $id => $file) {
            $ebookFile = EbookFile::findOrFail($id);

            // Delete old file
            if ($ebookFile->file_path) {
                Storage::disk('public_uploads')->delete($ebookFile->file_path);
            }

            // Store new file
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = 'ebooks/files/' . $request->user()->id . '/' . $fileName;

            Storage::disk('public_uploads')->put(
                $path,
                file_get_contents($file)
            );

            // Update record
            $ebookFile->update([
                'file_path' => $path,
                'file_name' => $fileName,
                'file_size' => $file->getSize(),
                'file_type' => $file->getClientMimeType(),
                'file_extension' => $file->getClientOriginalExtension(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Ebook File Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    //// Multi Image Delete ////
    public function deleteFile($id)
    {
        $oldfile = EbookFile::findOrFail($id);

        Storage::disk('public_uploads')->delete(
            $oldfile->file_path);

        $oldfile->delete();

        $notification = array(
            'message' => 'Ebook File Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method


}