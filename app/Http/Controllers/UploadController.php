<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Upload;

class UploadController extends Controller
{

	public function index(Request $request)
	{
		// do something
	}

	public function uploadTemp(Request $request)
	{
        // $files = Input::file('files');
        //
        //     if($files) {
        //
        //         foreach ($files as $key => $file) {
        //             $destinationPath = public_path() . '/uploads/';
        //
        //             $filename = $file->getClientOriginalName();
        //
        //             $upload_success = Input::file('files')->move($destinationPath, $filename);
        //
        //             if ($upload_success) {
        //
        //                 // resizing an uploaded file
        //                 Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);
        //
        //                 return Response::json('success', 200);
        //             } else {
        //                 return Response::json('error', 400);
        //             }
        //         }
        //
        //     }

        // return false;
	    // print_r($request->files);
        // die;
		// var_dump(Session::put('something', 'here'));
		// var_dump(Session::getId());
		// var_dump(Session::all());
		// $request->session()->regenerate();
		// var_dump(Session::getId());
		// var_dump(Session::all()); die;


        $file = Input::file('file');

              $upload = new Upload;


              try {
                  $upload->process($file);
              } catch(Exception $exception){
                  // Something went wrong. Log it.
                  Log::error($exception);
                  $error = array(
                      'name' => $file->getClientOriginalName(),
                      'size' => $file->getSize(),
                      'error' => $exception->getMessage(),
                  );
                  // Return error
                  return Response::json($error, 400);
              }

              // If it now has an id, it should have been successful.
              if ( $upload->id ) {
                  $newurl = URL::asset($upload->publicpath().$upload->filename);

                  // this creates the response structure for jquery file upload
                  $success = new stdClass();
                  $success->name = $upload->filename;
                  $success->size = $upload->size;
                  $success->url = $newurl;
                  $success->thumbnailUrl = $newurl;
                  $success->deleteUrl = action('UploadController@delete', $upload->id);
                  $success->deleteType = 'DELETE';
                  $success->fileID = $upload->id;

                  return Response::json(array( 'files'=> array($success)), 200);
              } else {
                  return Response::json('Error', 400);
              }
	}

}
