<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    function downloadFile($folder, $file_name)
    {
        $filePath = $folder . '/' . $file_name;
        if (Storage::disk('private')->exists($filePath)) {
            return Storage::disk('private')->download($filePath);
        }

        return abort(404);
    }
}