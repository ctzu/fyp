<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use App\Http\Controllers\Controller;
use Database\Seeds\ClubsTableSeeder;
use App\User;
use App\Club;

class ClubsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::with('lecturer')->get();
        return view('role.admin.clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturers = User::where('role', 'Lecturer')->get();
        return view('role.admin.clubs.create', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255', 
            'lecturer' => 'required'          
        ]);

        $club                           = new Club;
        $club->name                     = $request->nama;
        $club->lecturer_id              = $request->lecturer;
        $club->save();

        flash('Nama kelab berjaya disimpan.', 'success')->important();
        return redirect()->route('pentadbir.kelab.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = Club::findOrFail($id);
        $lecturers = User::where('role', 'Lecturer')->get();
        return view('role.admin.clubs.edit', compact('club', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255', 
            'lecturer' => 'required'          
        ]);

        $club                           = Club::findOrFail($id);
        $club->name                     = $request->nama;
        $club->lecturer_id              = $request->lecturer;
        $club->save();

        flash('Nama kelab berjaya disimpan.', 'success')->important();
        return redirect()->route('pentadbir.kelab.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
