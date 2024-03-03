<?php

namespace App\Traits;

trait FileUploadTrait
{
    public function fileUpload($image, $path)
    {
        $extension = $image->getClientOriginalExtension();
        $name = uniqid() . '.' . $extension;
        $image->move(public_path('uploads/' . $path), $name);
        return $name;
    }

    public function fileUpdate($image, $path, $old_image)
    {
        if ($old_image) {
            $old_image = public_path('uploads/' . $path . '/' . $old_image);
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }

        $extension = $image->getClientOriginalExtension();
        $name = uniqid() . '.' . $extension;
        $image->move(public_path('uploads/' . $path), $name);
        return $name;
    }

    public function fileDelete($image, $path)
    {
        if ($image) {
            $old_image = public_path('uploads/' . $path . '/' . $image);
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }
    }

    public function fileDownload($file, $path)
    {
        if (!$file) {
            return false;
        }

        if (!file_exists(public_path('uploads/' . $path . '/' . $file))) {
            return false;
        }

        $file_path = public_path('uploads/' . $path . '/' . $file);

        return $file_path;
    }
}
