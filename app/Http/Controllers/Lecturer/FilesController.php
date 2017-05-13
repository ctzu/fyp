<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;

class FilesController extends Controller
{
    /**
     * Return response download.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $file = File::findOrFail($id);

        return response()->download(storage_path("app/$file->path"));
    }
}
