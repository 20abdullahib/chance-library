<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;

class MaterialSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subjectId = $request->input('subject_id');
        // Get the name of the PDF file link from the request.
        $pdf_file_link = $request->input('FileLink');
        $pdf_file_name = $request->input('FileName');
        $pdf_file_download = $request->input('FileDownloadLink');

        // Create a new material object.
        $material = new Material();

        $material->subject_id = $subjectId;
        // Set the PDF file link property of the material object.
        $material->pdf_file_link = $pdf_file_link;
        $material->pdf_file_name = $pdf_file_name;
        $material->pdf_file_download = $pdf_file_download;

        // Save the material object to the database.
        $material->save();

        // Return a success response.
        return redirect()->route('subject.show', $material->subject_id)->with('success', 'file link Save successfully');
    }





    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view('dashboard.Subjects.material_subject', compact('subject'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = Material::findOrFail($id);

        $material->pdf_file_name = $request->input('pdf_file_name');
        $material->pdf_file_link = $request->input('pdf_file_link');
        if ($request->input('pdf_file_download')) {
            $material->pdf_file_download = $request->input('pdf_file_download');
        }
        $material->update();

        return redirect()->route('subject.show', $material->subject_id)->with('success', 'file link Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::findOrFail($id);

        $material->delete();

        return redirect()->route('subject.show', $material->subject_id)->with('success', 'file link Deleted successfully');
    }
}
