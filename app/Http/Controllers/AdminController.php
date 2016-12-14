<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use File;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        // return view('admin.dashboard');
        return redirect('/admin/prices');
    }

    public function managePrices()
    {
        return view('admin.manage_prices');
    }

    public function uploadPricesWB(Request $request)
    {
        // First, get files.
        $files = Input::file('files');
        // Check if file exists.
        if($files) {
            // Check if excel file exists.
            if(isset($files[0])) {
                // Clear files with `wb_prices` name in folder path.
                $this->deletePricesWB($request);
                // Create image name.
                $filename = 'wb_prices' . '.' . $files[0]->getClientOriginalExtension();
                $destinationPath = 'uploads/seed/';
                // Process image transport.
                $uploadSuccess = $files[0]->move($destinationPath, $filename);
                // Check if successful.
                if($uploadSuccess) {
                    // Process databse seeding.
                    $this->updatePricesWB($request);
                    // Success!
                    return json_encode([ 'status' => true ]);
                }
            }
        }
        return json_encode([ 'status' => false ]); // Ugh! Nope! Problem...
    }

    public function deletePricesWB(Request $request)
    {
        // Check if file directory exists.
        if(File::exists('uploads/seed')) {
            // Scan directory.
            $scan_result = scandir('uploads/seed');
            // Loop through all fetched files.
            foreach($scan_result as $key => $value) {
                // Only get files
                if(!in_array($value, array('.', '..'))) {
                    // If file's name has `wb_prices`.
                    if(strpos($value, 'wb_prices') !== false) {
                        // Delete file.
                        File::delete('uploads/seed/' . $value);
                    }
                }
            }
        }
    }

    public function updatePricesWB(Request $request)
    {
        // $seed = new SeedPrices();
        // var_dump($seed->updateWrist());
    }

    public function uploadPricesAO()
    {
        // First, get files.
        $files = Input::file('files');
        // Check if file exists.
        if($files) {
            // Check if excel file exists.
            if(isset($files[0])) {
                // Create image name.
                $filename = 'ao_prices' . '.' . $files[0]->getClientOriginalExtension();
                $destinationPath = 'uploads/seed/';
                // Process image transport.
                $uploadSuccess = $files[0]->move($destinationPath, $filename);
                // Check if successful.
                if($uploadSuccess) {
                    return json_encode([ 'status' => true ]); // Success!
                }
            }
        }
        return json_encode([ 'status' => false ]); // Ugh! Nope!
    }

    public function manageImages()
    {
        return view('admin.dashboard');
    }

    public function resetJSON()
    {
        return view('admin.dashboard');
    }

}
