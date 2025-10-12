<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{

    function uploadFile(Request $request, string $inputName, ?string $oldPath, string $path)
    {
        if ($request->hasFile($inputName)) {

            // Check if the old path is not a default image before deleting
            $defaultImages = [
                '/default/default_avatar.png',
                '/default/1748071366399486.jpg'
            ];

            if ($oldPath && !in_array($oldPath, $defaultImages) && Storage::disk('public_uploads')->exists($oldPath)) {
                Storage::disk('public_uploads')->delete($oldPath);
            }


            $image = $request->file($inputName);
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $path . '/' . $request->user()->id . '/' . $fileName;

            // $request->user()->id or unique id uniqeid()

            $directory = dirname($filePath);
            if (!Storage::disk('public_uploads')->exists($directory)) {
                Storage::disk('public_uploads')->makeDirectory($directory, 0755, true);
            }

            // Store the file
            Storage::disk('public_uploads')->put($filePath, file_get_contents($image));


            return $filePath;
        }
        return $oldPath; // Return existing path if no new file
    }

    public function uploadMultipleFiles(Request $request, string $inputName, ?string $oldPath, string $path)
    {
        $paths = [];

        if ($request->hasFile($inputName)) {
            foreach ($request->file($inputName) as $file) {

                $defaultImages = [
                    '/default/default_avatar.png',
                    '/default/1748071366399486.jpg'
                ];

                if ($oldPath && !in_array($oldPath, $defaultImages) && Storage::disk('public_uploads')->exists($oldPath)) {
                    Storage::disk('public_uploads')->delete($oldPath);
                }

                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $path . '/' . $request->user()->id . '/' . $fileName;

                $directory = dirname($filePath);
                if (!Storage::disk('public_uploads')->exists($directory)) {
                    Storage::disk('public_uploads')->makeDirectory($directory, 0755, true);
                }

                Storage::disk('public_uploads')->put(
                    $filePath,
                    file_get_contents($file)
                );

                $paths[] = $filePath;
            }
        }

        return $paths;
    }
}