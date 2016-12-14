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
        $scan_result = scandir('uploads/seed');
        $count = 0;
        $file = "";
        foreach($scan_result as $key => $value) {
            if(!in_array($value, array('.', '..'))) {
                if($count===0)
                    $file = $value;
                $count++;
            }
        }
        var_dump($count);
        var_dump($value);
        die;
        // var_dump(File::exists('uploads/seed/wb_prices.xlsx'));
        die;
        // First, get files.
        $files = Input::file('files');
        // Check if file exists.
        if($files) {
            // Check if excel file exists.
            if(isset($files[0])) {
                // Clear folder
                if(File::exists('uploads/seed')) {
                    File::cleanDirectory('uploads/seed');
                }
                // Create image name.
                $filename = 'wb_prices' . '.' . $files[0]->getClientOriginalExtension();
                $destinationPath = 'uploads/seed/';
                // Process image transport.
                $uploadSuccess = $files[0]->move($destinationPath, $filename);
                // Check if successful.
                if($uploadSuccess) {
                    return json_encode([ 'status' => true ]);
                }
            }
        }
        return json_encode([ 'status' => false ]);
    }

    public function updatePricesWB(Request $request)
    {
        //
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
                    return json_encode([ 'status' => true ]);
                }
            }
        }
        return json_encode([ 'status' => false ]);
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