<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ReportingImport;
use App\Imports\LeaveImport;
use App\Models\Leave;
use App\Models\Reporting;

class UploadController extends Controller
{
    
    public function reportingShow(){
        $reporting = Reporting::get();
       
        return Inertia::render("Upload/Show",[
            'reporting' => $reporting,
        ]);
    }

    public function leaveShow(){
        $leave = Leave::get();
       
        return Inertia::render("Upload/Leave",[
            'leave' => $leave,
        ]);
    }
    
    public function upload(){
        return Inertia::render("Upload/Upload");
    }

    public function uploadReportingStore(Request $request){
        // dd($request);

        $reportImport = new ReportingImport;

        $file = $request->file('file');
        $rows = Excel::import($reportImport, $file);
        $amount =  $reportImport->getRowCount();
        // return redirect('department')->withSuccess(trans('Excel Uploaded Successfully. Total Upload: '. $amount));
        return redirect()->route('upload')->with('message', 'Reporting Excel Uploaded Successfully! Total Upload:'. $amount);
    }

    public function uploadLeaveStore(Request $request){
        // dd($request);

        $leaveImport = new LeaveImport;

        $file = $request->file('file');
        $rows = Excel::import($leaveImport, $file);
        $amount =  $leaveImport->getRowCount();
        // return redirect('department')->withSuccess(trans('Excel Uploaded Successfully. Total Upload: '. $amount));
        return redirect()->route('upload')->with('message', 'Leave Excel Uploaded Successfully! Total Upload:'. $amount);
    }
}
