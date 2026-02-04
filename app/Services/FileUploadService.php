<?php

namespace App\Services;

use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * Upload single file
     */
    public function uploadSingle($file, $folder)
    {
        if (!$file) return null;

        $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $name);

        return $folder . '/' . $name; // path saved in DB
    }

    /**
     * Upload multiple files
     */
    public function uploadMultiple($files, $folder)
    {
        if (!$files) return [];

        $paths = [];

        foreach ($files as $file) {
            $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $name);
            $paths[] = $folder . '/' . $name;
        }

        return $paths;
    }
}
