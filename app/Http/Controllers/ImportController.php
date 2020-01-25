<?php


namespace App\Http\Controllers;

use App\Certificaat;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function getImport()
    {
        return view('import');
    }

    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, 5);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('import_fields', compact('csv_data', 'csv_data_file'));

    }

//        $csv_data_file = CsvData::create([
//            'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
//            'csv_header' => $request->has('header'),
//            'csv_data' => json_encode($data)
//        ]);
//
//        $csv_data = array_slice($data, 0, 6);
//        return view('import_fields', compact('csv_data'));
        // To be continued...

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
//        $request->fields = array_flip($request->fields);
        foreach ($csv_data as $row) {
            $certificaat = new Certificaat();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $certificaat->$field = $row[$request->fields[$field]];
                } else {
                    $certificaat->$field = $row[$request->fields[$index]];
                }
            }
            $certificaat->save();
        }
        return view('import_success');
    }
}
