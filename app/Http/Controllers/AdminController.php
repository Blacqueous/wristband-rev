<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AddOns;
use App\Models\Prices;
use App\Models\TimeProduction;
use App\Models\TimeShipping;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;

class AdminController extends Controller
{
    protected $storagePriceWristband;
    protected $storagePriceAddon;

    public function __construct()
    {
        $this->middleware('admin');
        $this->storagePriceWristband = Storage::disk('upload-csv-price-wristband');
        $this->storagePriceAddon = Storage::disk('upload-csv-price-addon');
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
                $filename = 'prices' . '.' . $files[0]->getClientOriginalExtension();
                // Process image transport.
                $uploadSuccess = $this->storagePriceWristband->put($filename, $files[0]);
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
        // Get files
        $files = $this->storagePriceWristband->allFiles('/');
        // Check if directory has files.
        if(count($files) > 0) {
            // Clear all files in this Storage.
            $this->storagePriceWristband->delete($files);
        }
        // Next are the created directories...
        // Get directories
        $dir = $this->storagePriceWristband->allDirectories('/');
        // Check if has existing directories.
        if(count($dir) > 0) {
            // Loop through directories.
            foreach ($dir as $key => $value) {
                // Remove directory.
                $this->storagePriceWristband->deleteDirectory($value);
            }
        }
    }

    public function updatePricesWB(Request $request)
    {
        // Get files
        $files = $this->storagePriceWristband->allFiles('/');
        $csv = [];
        // Check if has files
        if(count($files) > 0) {
            $file = $this->storagePriceWristband->get($files[0]);
            try {
                Excel::load($file, function ($reader) {
                    foreach ($reader->toArray() as $sheet) {
                        $sheet_rows = [];
                        foreach ($sheet as $row) {
                            print_r($sheetKey);
                            die;
                            if($row['style'] !== null || $row['size'] !== null ) {
                                foreach ($row as $key => $value) {
                                    if(is_int($key)) {
                                        $sheet_rows[] = [
                                            'style_id' => $row['style'],
                                            'size_id' => $row['size'],
                                            'qty' => $key,
                                            'price' => $value
                                        ];
                                    }
                                }
                            }
                        }
                        print_r($sheet_rows);
                        die;
                    }
                });
            } catch (\Exception $e) {
                return false;
            }
        }
        // if(count($files) > 0) {
        //     $prices = new Prices();
        //     return $prices->insertPrice($data);
        // }
        // return true;
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
