<?php

namespace App\Http\Controllers\ChanceWebsite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\Material;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display data in the search page.
     */
    public function display(Request $request)
    {
        $perPage = 21; // Number of subjects per page

        $categories = Category::all();
        $departments = Department::all();
        $professors = Professor::all();

        // Get all materials with subject, department, category, and professor relations
        $materials = Material::with('subject.department', 'subject.category', 'subject.professor')
            ->paginate($perPage);

        return view('ChanceWebsite.pages.Search.Search', compact('categories', 'departments', 'professors', 'materials'));
    }

    // // Filter by ID
    public function search_result_filterID($filter, $id, Request $request)
    {
        // Define the valid filter types to prevent SQL injection
        $validFilters = ['category', 'department', 'professor'];

        // Check if the provided filter type is valid
        if (!in_array($filter, $validFilters)) {
            abort(404); // You can customize this to handle invalid filter types
        }

        // Initialize the Eloquent query builder for materials
        $query = Material::query();

        // Apply the appropriate filter based on the filter type
        switch ($filter) {
            case 'category':
                $query->whereHas('subject.category', function ($subQuery) use ($id) {
                    $subQuery->where('category_id', $id);
                });
                break;
            case 'department':
                $query->whereHas('subject.department', function ($subQuery) use ($id) {
                    $subQuery->where('department_id', $id);
                });
                break;
            case 'professor':
                $query->whereHas('subject.professor', function ($subQuery) use ($id) {
                    $subQuery->where('professor_id', $id);
                });
                break;
        }

        // Paginate the filtered materials
        $perPage = 21;
        $materials = $query->paginate($perPage);

        // Fetch all categories, departments, professors
        $categories = Category::all();
        $departments = Department::all();
        $professors = Professor::all();

        // Get the count of available results
        $count = $materials->total();

        return view('ChanceWebsite.pages.Search.Search_Result', compact(
            'materials',
            'categories',
            'departments',
            'professors',
            'count'
        ));
    }

    // Search results by query
    public function search_result(Request $request)
    {
        $query = $request->input('query');

        // Search for materials by subject name, department name, category name, or professor name
        $materials = Material::where(function ($materialQuery) use ($query) {
            $materialQuery->orWhereHas('subject', function ($subjectQuery) use ($query) {
                $subjectQuery->where('subject_name', 'like', '%' . $query . '%');
            })
                ->orWhereHas('subject.department', function ($departmentQuery) use ($query) {
                    $departmentQuery->where('department_name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('subject.category', function ($categoryQuery) use ($query) {
                    $categoryQuery->where('category_name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('subject.professor', function ($professorQuery) use ($query) {
                    $professorQuery->where('professor_name', 'like', '%' . $query . '%');
                })
                ->orWhere('pdf_file_name', 'like', '%' . $query . '%');
        })->paginate(21);

        $count = count($materials);
        $categories = Category::all();
        $departments = Department::all();
        $professors = Professor::all();

        return view('ChanceWebsite.pages.Search.Search_Result', compact('materials', 'count', 'categories', 'departments', 'professors'));
    }

    // // The search_result_All function

    public function search_result_All(Request $request, $filter, $value)
    {
        $materials = Material::with(['subject.department', 'subject.category', 'subject.professor']);

        // Check if the filter is for the 'category', 'department', 'professor', or 'material' and the value is 'all'
        if (in_array($filter, ['category', 'department', 'professor', 'material']) && $value === 'all') {
            // Fetch materials without applying the filter
            // You can also add any other filter-specific logic here
            $materials = $materials->paginate(21);

            $query = Material::query(); // Your query builder instance
            $count = $this->getAvailableResultsCount($query);

            $categories = Category::all();
            $departments = Department::all();
            $professors = Professor::all();
            // You may fetch other related data here as needed

            return view('ChanceWebsite.pages.Search.Search_Result', compact(
                'materials',
                'categories',
                'departments',
                'professors',
                'count'
            ));
        }
    }

    /**
     * Get the count of available results for a query.
     *
     * @param Builder $query
     * @return int
     */
    private function getAvailableResultsCount(Builder $query)
    {
        // Use the count() method to get the total count of matching records
        return $query->count();
    }
}
