<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;
use Storage;

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            $file = File::findOrFail($id);

            $file->delete();

            Storage::delete($file->path);

            return response()->json("Fail berjaya dihapuskan.", 200);
        }
    }
}
