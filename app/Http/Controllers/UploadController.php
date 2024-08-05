<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ReportingImport;

class UploadController extends Controller
{
    public function uploadReporting(){
        return Inertia::render("Upload/Reporting");
    }

    public function uploadReportingStore(Request $request){
        // dd($request);

        $departmentImport = new ReportingImport;

        $file = $request->file('file');
        $rows = Excel::import($departmentImport, $file);
        $amount =  $departmentImport->getRowCount();
        // return redirect('department')->withSuccess(trans('Excel Uploaded Successfully. Total Upload: '. $amount));
        return redirect()->route('uploadReporting')->with('message', 'Excel Uploaded Successfully! Total Upload:'. $amount);
    }
}
