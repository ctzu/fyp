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
use Barryvdh\DomPDF\PDF;

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
        $activities = auth()->user()->activities()->latest()->paginate();
        return view('role.student.activities.index', compact('activities'));
    }

    // public function transcript()
    // {
    //     $transcripts = auth()->user()->activities()->latest()->paginate();
    //     return view('role.student.transkrip.index', compact('transcripts'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::get();
        $activityCommittees = ActivityCommittee::get();
        $activityLevels = ActivityLevel::get();
        $activityAchievements = ActivityAchievement::get();
        return view('role.student.activities.create', compact('clubs', 'activityCommittees', 'activityLevels', 'activityAchievements'));
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
            'nama_kelab'        => 'required',
            'nama_aktiviti'     => 'required',
            'tempat_aktiviti'   => 'required',
            'tarikh_aktiviti'   => 'required',
            'peringkat'         => 'required',
            'pencapaian'        => 'required',
            'jawatankuasa'      => 'required',
        ]);

        $activity                           = new Activity;
        $activity->club_id                  = $request->nama_kelab;
        $activity->name                     = $request->nama_aktiviti;
        $activity->place                    = $request->tempat_aktiviti;
        $activity->date                     = $request->tarikh_aktiviti;
        $activity->activity_level_id        = $request->peringkat;
        $activity->activity_achievement_id  = $request->pencapaian;
        $activity->activity_committee_id    = $request->jawatankuasa;
        $activity->activity_status_id       = ActivityStatus::where('label', 'Sedang Diproses')->value('id');
        $activity->created_by               = auth()->id();
        $activity->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $path = $uploadedFile->store("files");
                $file                   = new File;
                $file->activity_id      = $activity->id;
                $file->path             = $path;
                $file->old_file_name    = $uploadedFile->getClientOriginalName();
                $file->file_mime        = $uploadedFile->getMimeType();
                $file->save();
            }
        }

        flash('Maklumat aktiviti berjaya disimpan.', 'success')->important();
        return redirect()->route('pelajar.aktiviti.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::with('club', 'level', 'achievement', 'committee', 'status', 'files', 'user')->findOrFail($id);
        return view('role.student.activities.show', compact('activity'));
    }

    // public function papar($id)
    // {
    //     $activity = Activity::with('club', 'level', 'achievement', 'committee', 'status', 'files', 'user.markahMerit')->findOrFail($id);
    //     return view('role.student.activities.papar', compact('activity'));
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubs = Club::get();
        $activitycommittees = ActivityCommittee::get();
        $activityLevels = ActivityLevel::get();
        $activityAchievements = ActivityAchievement::get();
        $activity = Activity::with('files')->findOrFail($id);
        return view('role.student.activities.edit', compact('clubs', 'activitycommittees', 'activityLevels', 'activityAchievements', 'activity'));
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
            'nama_kelab'        => 'required',
            'nama_aktiviti'     => 'required',
            'tempat_aktiviti'   => 'required',
            'tarikh_aktiviti'   => 'required',
            'peringkat'         => 'required',
            'pencapaian'        => 'required',
            'jawatankuasa'      => 'required',
        ]);

        $activity                                = Activity::findOrFail($id);
        $activity->club_id                       = $request->nama_kelab;
        $activity->name                          = $request->nama_aktiviti;
        $activity->place                         = $request->tempat_aktiviti;
        $activity->date                          = $request->tarikh_aktiviti;
        $activity->activity_level_id             = $request->peringkat;
        $activity->activity_achievement_id       = $request->pencapaian;
        $activity->activity_committee_id         = $request->jawatankuasa;
        $activity->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $path                   = $uploadedFile->store("files");
                $file                   = new File;
                $file->activity_id      = $activity->id;
                $file->path             = $path;
                $file->old_file_name    = $uploadedFile->getClientOriginalName();
                $file->file_mime        = $uploadedFile->getMimeType();
                $file->save();
            }
        }

        flash('Maklumat aktiviti berjaya dikemaskini.', 'success')->important();
        return redirect()->route('pelajar.aktiviti.index');
    }

    public function showReceipt($id){
        $activity = Activity::findOrFail($id);
        return view('role.student.activity.transcript',compact('activity'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::destroy($id);

        flash('Maklumat aktiviti berjaya dihapuskan.', 'success')->important();
        return back();
    }
}
