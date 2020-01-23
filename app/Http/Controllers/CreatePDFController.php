<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificaat;
use PDF;
use App\User;

class CreatePDFController extends Controller
{
    public function create()
    {
        return view('form');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'course' => 'required|max:255',
        ]);
        Certificaat::create($validatedData);

        return redirect('/createpdf')->with('success', 'Certificate is successfully saved');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'course' => 'required|max:255',
        ]);
        Certificaat::whereId($id)->update($validatedData);

        return redirect('/createpdf')->with('success', 'Certificate is successfully updated');
    }

    public function index()
    {
        $pdfs = Certificaat::all();

        return view('list', compact('pdfs'));
    }


    public function edit($id)
    {
        $pdf = Certificaat::findOrFail($id);

        return view('edit', compact('pdf'));
    }

    public function destroy($id)
    {
        $pdf = Certificaat::findOrFail($id);
        $pdf->delete();

        return redirect('/createpdf')->with('success', 'Certificate is successfully deleted');
    }

    public function downloadPDF($id)
    {
//        $user = User::get();
        $pdf = Certificaat::find($id);
        $pdf = PDF::loadView('pdf', compact('pdf'));
        return $pdf->download('certificaat.pdf');
    }
}
