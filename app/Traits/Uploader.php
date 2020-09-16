<?php


namespace App\Traits;


use Illuminate\Support\Facades\Storage;

trait Uploader
{

    public function uploadPublic($request,$folderName)
    {
        if ($request->hasFile('file')) {
            $file = time().'.'.$request->file->extension();
            $request->file->move(public_path($folderName), $file);
            return $file;
        }
        return false;
    }

    public function storageUpload($request,$folderName)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file')->store($folderName);
            return $file;
        }
        return false;
    }
}
