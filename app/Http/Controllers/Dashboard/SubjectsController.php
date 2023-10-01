<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddSubjectRequest;
use App\Http\Requests\SearchSubjectRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Material;
use App\Models\Professor;
use App\Models\Subject;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $categories = Category::all();
    //     $departments = Department::all();
    //     $professors = Professor::all();
    //     $materials = Material::all();

    //     $query = Subject::with(['category', 'department', 'professor', 'material']);

    //     // Apply filters based on user selections, if any
    //     if (request()->filled('category')) {
    //         $query->whereHas('category', function ($query) {
    //             $query->where('category_name', request('category'));
    //         });
    //     }

    //     if (request()->filled('department')) {
    //         $query->whereHas('department', function ($query) {
    //             $query->where('department_name', request('department'));
    //         });
    //     }

    //     if (request()->filled('professor')) {
    //         $query->whereHas('professor', function ($query) {
    //             $query->where('professor_name', request('professor'));
    //         });
    //     }

    //     if (request()->filled('material')) {
    //         $query->whereHas('material', function ($query) {
    //             $query->where('material_name', request('material'));
    //         });
    //     }

    //     $subjects = $query->paginate(20);

    //     return view('dashboard.Subjects.show_subject', compact('subjects', 'categories', 'departments', 'professors', 'materials'));
    // }

    public function index()
    {
        $categories = Category::all();
        $departments = Department::all();
        $professors = Professor::all();
        $materials = Material::all();

        $query = Subject::with(['category', 'department', 'professor', 'materials']);

        // Apply filters based on user selections, if any
        if (request()->filled('category')) {
            $query->whereHas('category', function ($query) {
                $query->where('category_name', request('category'));
            });
        }

        if (request()->filled('department')) {
            $query->whereHas('department', function ($query) {
                $query->where('department_name', request('department'));
            });
        }

        if (request()->filled('professor')) {
            $query->whereHas('professor', function ($query) {
                $query->where('professor_name', request('professor'));
            });
        }

        if (request()->filled('materials')) {
            $query->whereHas('material', function ($query) {
                $query->where('material_name', request('material'));
            });
        }

        $subjects = $query->paginate(20);

        return view('Dashboard.pages.Subject.All_Subject', compact('subjects', 'categories', 'departments', 'professors', 'materials'));
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();
        $professors = Professor::all();
        $materials = Material::all();

        return view('Dashboard.pages.Subject.Add_Subject', compact('categories', 'departments', 'professors', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSubjectRequest $request)
    {
        // Create a new subject record
        $subject = Subject::create([
            'subject_name' => $request->input('subject_name'),
            'academic_subject_code' => $request->input('academic_subject_code'),
            'department_id' => $request->input('department_id'),
            'category_id' => $request->input('category_id'),
            'professor_id' => $request->input('professor_id'),
            'description' => $request->input('description'),
        ]);

        // Create and associate materials with the subject
        // $pdfFileLinks = $request->input('pdf_file_link');

        // foreach ($pdfFileLinks as $pdfFileLink) {
        //     $material = new Material();
        //     $material->pdf_file_link = $pdfFileLink; // Use $pdfFileLink, not $pdfFileLinks
        //     $material->subject_id = $subject->id;
        //     $material->save();
        // }
        // Redirect to a success page or any other desired action
        return redirect()->route('subject.create')->with('success', 'Subject created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::findOrFail($id);
        $materials = Material::where('subject_id', $subject->id)->get();

        $materialPdfLinks = [];
        foreach ($materials as $material) {
            $materialPdfLinks[] = $material->pdf_file_link;
        }
        return view('Dashboard.pages.Material.Material_Subject_Details', compact('subject', 'materials', 'materialPdfLinks'));
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


    public function update(Request $request, $subjectId)
    {
        // Find the subject by ID
        $subject = Subject::findOrFail($subjectId);

        // Update the subject's attributes based on the request data
        // Use mass assignment instead of manually updating each attribute
        $subject->fill($request->all());

        // Update the pdf_file_link inside the associated material
        if ($request->has('pdf_file_link')) {
            $subject->material->pdf_file_link = $request->pdf_file_link;
            $subject->material->save();
        }

        // Update the subject's attributes based on the request data
        $subject->update($request->except(['_token']));

        // Return a response indicating success
        return redirect()->route('subject.index')->with('success', 'Subject updated successfully');
    }






    // return redirect()->route('subject.index')->with('success', 'Subject updated successfully');
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the subject by its ID
        $subject = Subject::find($id);

        // Check if the subject exists
        if (!$subject) {
            return redirect()->route('subject.index')->with('error', 'Subject not found.');
        }

        // Delete associated videos
        $subject->videos()->delete();

        // Delete the subject itself
        $subject->delete();

        // Redirect to the index page with a success message
        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully.');
    }

    /**
     * search the specified resource from storage.
     */

    public function search(SearchSubjectRequest $request)
    {
        $search = $request->input('search');

        $search = str_replace(' ', '', $search);

        $subjects = Subject::query()
            ->where(function ($query) use ($search) {
                $query->whereRaw("REPLACE(subject_name, ' ', '') LIKE ?", ["%$search%"])
                    ->orWhereRaw("REPLACE(academic_subject_code, ' ', '') LIKE ?", ["%$search%"])
                    ->orWhereRaw("REPLACE(category_id, ' ', '') LIKE ?", ["%$search%"])
                    ->orWhereRaw("REPLACE(professor_id, ' ', '') LIKE ?", ["%$search%"])
                    ->orWhereRaw("REPLACE(material_id, ' ', '') LIKE ?", ["%$search%"]);
            })
            ->paginate(20);

        // Use the total property to get the count of available results
        $resultsCount = $subjects->total();


        $categories = Category::all();
        $departments = Department::all();
        $professors = Professor::all();
        $materials = Material::all();

        return view('dashboard.Subjects.result_subject', compact('subjects', 'resultsCount', 'categories', 'departments', 'professors', 'materials'));
    }
}
