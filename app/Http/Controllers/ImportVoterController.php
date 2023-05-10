<?php

namespace App\Http\Controllers;

use App\Imports\VotersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportVoterController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new VotersImport, $request->file);
        return back();
    }
}
