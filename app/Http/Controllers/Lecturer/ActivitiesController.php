<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\MarkahMerit;

class ActivitiesController extends Controller
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
        $activities = Activity::where('is_approved', false)->latest()->paginate();
        return view('role.lecturer.activities.index', compact('activities'));
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
        $activity = Activity::with('club', 'level', 'achievement', 'committee', 'status', 'files', 'user', 'markahMerit')->findOrFail($id);
        $markah = $activity->markahMerit;
        return view('role.lecturer.activities.show', compact('activity', 'markah'));
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function papar($id)
    {
        $activity = Activity::with('club', 'level', 'achievement', 'committee', 'status', 'files', 'user', 'markahMerit')->findOrFail($id);
        $markah = $activity->markahMerit;
        return view('role.lecturer.activities.papar', compact('activity', 'markah'));
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
        // Sahkan kemasukan markah
        $this->validate($request, [
            'markah' => 'required'
        ]);

        // Dapatkan aktiviti
        $activity = Activity::findOrFail($id);
        // Kemaskini aktiviti
        $activity->update([
            'activity_status_id' => 2,
            'is_approved' => true
        ]);
        // Kemaskini markah jika wujud, jika tidak create baru
        $markah = MarkahMerit::firstOrCreate(
            [
                'user_id'        => $activity->created_by,
                'activity_id'    => $activity->id
            ],
            [
                'user_id'     => $activity->created_by,
                'activity'    => $activity->id,
                'markah'      => $request->markah
            ]
        );

        flash('Markah berjaya dikemaskini.', 'success')->important();
        return redirect()->route('pensyarah.aktiviti.index');
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
