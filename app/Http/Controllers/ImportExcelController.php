<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportExcelController extends Controller
{
    function index()
    {
        return view('tools.exceltokmz.home');
    }

    function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xls,xlsx',
        ]);
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();


        return "";
    }
}
