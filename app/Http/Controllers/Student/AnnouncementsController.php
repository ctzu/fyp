<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Club;
use App\File;

class AnnouncementsController extends Controller
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
        $announcements = auth()->user()->announcements()->paginate();
        return view('role.student.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::get();
        return view('role.student.announcements.create', compact('clubs'));
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
            'nama_program'        => 'required',
            'nama_kelab'          => 'required',
            'perincian'           => 'required',
            'tempat_program'      => 'required',
            'tarikh_program'      => 'required',
        ]);

        $announcement                           = new Announcement;
        $announcement->title                    = $request->nama_program;
        $announcement->club_id                  = $request->nama_kelab;        
        $announcement->description              = $request->perincian;
        $announcement->placeP                   = $request->tempat_program;
        $announcement->dateP                    = $request->tarikh_program;
        $announcement->created_by               = auth()->id();
        $announcement->save();

        flash('Maklumat hebahan berjaya disimpan.', 'success')->important();

        return redirect()->route('pelajar.hebahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::with('club','user')->findOrFail($id);
        return view('role.student.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubs = Club::get();
        $announcement = Announcement::findOrFail($id);
        return view('role.student.announcements.edit', compact('clubs','announcement'));
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
            'nama_program'        => 'required',
            'nama_kelab'          => 'required',
            'perincian'           => 'required',
            'tempat_program'      => 'required',
            'tarikh_program'      => 'required',
        ]);

        $announcement                           = Announcement::findOrFail($id);
        $announcement->title                    = $request->nama_program;
        $announcement->club_id                  = $request->nama_kelab;
        $announcement->description              = $request->perincian;
        $announcement->placeP                   = $request->tempat_program;
        $announcement->dateP                    = $request->tarikh_program;
        $announcement->created_by               = auth()->id();
        $announcement->save();


        flash('Maklumat hebahan berjaya dikemaskini.', 'success')->important();
        return redirect()->route('pelajar.hebahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::destroy($id);
        flash('Maklumat hebahan berjaya dihapuskan.', 'success')->important();
        return back();
    }
}
