<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Club;
use App\File;
use App\ActivityLevel;
use App\ActivityCommittee;
use App\ActivityAchievement;
use App\ActivityStatus;
use App\StudentStatus;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;


class TranscriptsController extends Controller
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
        // $transcripts = auth()->user()->transcripts()->latest()->paginate();
        
        $transcripts = Activity::with('user')->where('created_by',Auth::user()->id)->get();
        // dd($transcripts);
        return view('role.student.transcripts.index', compact('transcripts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::with('club', 'committee', 'user.markahMerit')->findOrFail($id);
        return view('role.student.transcripts.show', compact('activity'));
    }

    public function showReceiptPDF() {
        $activities = Activity::with('user')->where('created_by',Auth::user()->id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('role.student.show',compact('activities'));
        return $pdf->stream('show.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
         // Sahkan kemasukan status pelajar
        $this->validate($request, [
            'label_pelajar' => 'required'
        ]);

        // Dapatkan aktiviti
        $activity = Activity::findOrFail($id);

        // Kemaskini status pelajar jika wujud, jika tidak create baru
        $label_pelajar = StudentStatus::firstOrCreate(
            [
                'label_pelajar'      => $request->label_pelajar
            ]
        );

        flash('Markah berjaya dikemaskini.', 'success')->important();
        return redirect()->route('pelajar.transkrip.index');
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
