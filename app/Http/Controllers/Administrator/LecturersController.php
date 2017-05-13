<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewAccountSuccessfullyRegistered;
use App\User;

class LecturersController extends Controller
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
        $lecturers = User::where('role', 'Lecturer')->latest()->paginate();
        return view('role.admin.lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.admin.lecturers.create');
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
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $password = str_random(10);

        $user = User::create([
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => bcrypt($password),
            'role'     => 'Lecturer'
        ]);

        $user->lecturer()->create([
            'user_id'     => $user->id,
            'workers_no'  => $request->no_pekerja
        ]);

        $user->notify(new NewAccountSuccessfullyRegistered($user->email, $password));

        flash('Akaun pensyarah berjaya disimpan.', 'success')->important();
        return redirect()->route('pentadbir.pensyarah.index');
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
        //
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
