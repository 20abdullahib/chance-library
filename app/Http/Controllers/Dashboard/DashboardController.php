<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Admins= DB::table("admins")->get();
        $materials= DB::table("materials")->get('pdf_file_link');
        // $adminCount = Admin::count();

        return view('Dashboard.Home_Dashboard',compact('Admins', 'materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.pages.Admin.Add_Admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'admin_id' => $request->input('admin_id'),
            // 'password' => bcrypt($request->input('password')),
            'password' => ($request->input('password')),
            'Gender' => $request->input('Gender'),
            'rank' => $request->input('rank'),
        ]);
        session()->flash('success', 'Created New Admin successfully.');
        return redirect()->route('admin.create')->with('success', 'Create New Admin successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id = null)
    {
        $Admins = DB::table("admins")->get();

        return view('Dashboard.pages.Admin.Show_Admins', compact('Admins'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $record = $id;
        $record = Admin::find($record);

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $record->delete();
        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');
    }
}
