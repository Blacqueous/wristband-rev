<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AddOns;
use App\Models\Prices;
use App\Models\Sizes;
use App\Models\Styles;
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

    public function updatePricesWB(Request $request)
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
                    $this->updatePricesWBData($request);
                    // Success!
                    return json_encode([ 'status' => true ]);
                }
            }
        }
        return json_encode([ 'status' => false ]); // Ugh! Nope! Problem...
    }

    public function reuploadPricesWB(Request $request)
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
                    // Success!
                    return json_encode([ 'status' => true ]);
                }
            }
        }
        return json_encode([ 'status' => false ]); // Ugh! Nope! Problem...
    }

    public function reprocessPricesWB(Request $request)
    {
        // $status = $this->updatePricesWBData($request);
        return json_encode([ 'status' => $status ]);
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

    public function updatePricesWBData(Request $request)
    {
        // Get files
        $files = $this->storagePriceWristband->allFiles('/');
        $csv = [];
        // Check if has files
        if(count($files) > 0) {
            $file = $this->storagePriceWristband->get($files[0]);
            try {
                Excel::load($file, function ($reader) {
                    $csv = [];
                    $sizes = Sizes::getArrayByCode();
                    $styles = Styles::getArrayByCode();
                    foreach ($reader->toArray() as $sheet) {
                        foreach ($sheet as $rowKey => $row) {
                            if($row['style'] !== null || $row['size'] !== null ) {
                                foreach ($row as $key => $value) {
                                    if(is_int($key)) {
                                        $csv[] = [
                                            'style_id' => $styles[$row['style']],
                                            'size_id' => $sizes[$row['size']],
                                            'qty' => $key,
                                            'price' => $value
                                        ];
                                    }
                                }
                            }
                        }
                    }
                    if(count($csv) > 0) {
                        Prices::truncatePrice();
                        Prices::insertPrice($csv);
                        return true;
                    }
                });
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
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
