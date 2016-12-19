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
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Response;
use Session;
use Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
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
                // Clear folder
                if(File::exists('uploads/prices/wristband')) {
                    File::cleanDirectory('uploads/prices/wristband');
                }
                // Clean directory first.
                $this->deletePricesWB($request);
                // Create image name.
                $filename = 'price' . '.' . $files[0]->getClientOriginalExtension();
                $destinationPath = 'uploads/prices/wristband/';
                // Process image transport.
                $uploadSuccess = $files[0]->move($destinationPath, $filename);
                // Check if successful.
                if($uploadSuccess) {
                    // Process database seeding.
                    $update_status = $this->updatePricesWBData($request);
                    // Release upload status.
                    return json_encode([ 'status' => $update_status ]);
                }
            }
        }
        return json_encode([ 'status' => false ]);
    }

    public function downloadPricesWB(Request $request)
    {
        switch ($request->ext) {
            case 'csv': // Return .csv format file
                return Response::download('format/prices/wristband.csv', 'price_wristbands.csv');
                break;

            case 'xls': // Return .xls format file
                return Response::download('format/prices/wristband.xls', 'price_wristbands.xls');
                break;

            case 'xlsxx': // Return .xlsx format file
                return Response::download('format/prices/wristband.xlsx', 'price_wristbands.xlsx');
                break;

            default: // Return .csv as default format file
                return Response::download('format/prices/wristband.csv', 'price_wristbands.csv');
                break;
        }
    }

    public function reuploadPricesWB(Request $request)
    {
        // First, get files.
        $files = Input::file('files');
        // Check if file exists.
        if($files) {
            // Check if excel file exists.
            if(isset($files[0])) {
                // Clean directory first.
                $this->deletePricesWB($request);
                // Create image name.
                $filename = 'price' . '.' . $files[0]->getClientOriginalExtension();
                $destinationPath = 'uploads/prices/wristband/';
                // Process image transport.
                $uploadSuccess = $files[0]->move($destinationPath, $filename);
                // Check if successful.
                if($uploadSuccess) {
                    // Upload successful.
                    return json_encode([ 'status' => true ]);
                }
            }
        }
        return json_encode([ 'status' => false ]);// Ugh! Nope! Problem...
    }

    public function reprocessPricesWB(Request $request)
    {
        // Reprocess database seeding.
        $update_status = $this->updatePricesWBData($request);
        // Release upload status.
        return json_encode([ 'status' => $update_status ]);
    }

    public function deletePricesWB(Request $request)
    {
        // Check if folder exists.
        if(File::exists('uploads/prices/wristband')) {
            // Clean the folder.
            File::cleanDirectory('uploads/prices/wristband');
        }
    }

    public function updatePricesWBData(Request $request)
    {
        $count = 0;
        $files = [];
        // Get files
        do{
            $files = File::allFiles('uploads/prices/wristband/');
            $count++;
        } while ($count < 50 && count($files) < 0);

        $csv = [];
        // Check if has files
        if(count($files) > 0) {
            // $file = File::get($files[0]->getPathname());
            try {
                Excel::load($files[0]->getPathname(), function ($reader) {
                    $csv = [];
                    $sizes = Sizes::getArrayByCode();
                    $styles = Styles::getArrayByCode();
                    foreach ($reader->toArray() as $sheet) {
                        if(!isset($sheet['style_code']) || !isset($sheet['size_code'])) {
                            foreach ($sheet as $rowKey => $row) {
                                if($row['style_code'] !== null || $row['size_code'] !== null ) {
                                    foreach ($row as $key => $value) {
                                        if(is_int($key)) {
                                            $csv[] = [
                                                'style_id' => $styles[$row['style_code']],
                                                'size_id' => $sizes[$row['size_code']],
                                                'qty' => $key,
                                                'price' => $value
                                            ];
                                        }
                                    }
                                }
                            }
                        } else {
                            if($sheet['style_code'] !== null || $sheet['size_code'] !== null ) {
                                foreach ($sheet as $key => $value) {
                                    if(is_int($key)) {
                                        $csv[] = [
                                            'style_id' => $styles[$sheet['style_code']],
                                            'size_id' => $sizes[$sheet['size_code']],
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
                    }
                });
            } catch (\Exception $e) {
                return false;
            }
            return true;
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

    public function downloadPricesAO()
    {
        echo "lol";
        die;
        // return "lol";
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
