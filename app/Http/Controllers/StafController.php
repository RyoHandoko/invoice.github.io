<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StafController extends Controller
{
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
        $user = User::role('staff')->get();
        return view('dashboard.staff.index', compact('user'));
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

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users|string|digits_between:10,15',
            'password' => 'required|string|min:6|confirmed'
        ], [
            'email.unique' => 'E-Mail sudah terdaftar',
            'email.required' => 'E-Mail tidak boleh kosong',
            'phone.required' => 'No HP tidak boleh kosong',
            'phone.unique' => 'No HP sudah terdaftar',
            'phone.digits_between' => 'Harus Berupa Angka, dan Min nomer 9 angka dan max 14 angka',
            'phone.numeric' => 'No HP hanya boleh berisi angka',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Password Tidak Sama',
        ]);

        $new = new User();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->phone = $request->phone;
        $new->password = Hash::make($request->password);
        $new->assignRole('staff');
        $new->save();

        session()->flash('scs');
        return back();
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
        $edit = User::find($id);

        return view('dashboard.staff.edit', compact('edit'));
    }

    public function editprofil()
    {
        $edit = User::where('id', Auth::user()->id)->first();

        return view('dashboard.staff.edit', compact('edit'));
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
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'name' => 'required',
            'phone' => 'required|string|digits_between:10,15',
            // 'password' => 'min:6|confirmed',
        ], [
            'email.unique' => 'E-Mail Sudah terdaftar',
            'email.required' => 'E-Mail tidak boleh kosong',
            'phone.required' => 'No HP tidak boleh kosong',
            'phone.digits_between' => 'Harus Berupa Angka, dan Min nomer 9 angka dan max 14 angka',
            'phone.numeric' => 'No HP hanya boleh berisi angka',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Password Tidak Sama',
        ]);

        $edit = User::find($id);
        $edit->name = $request->name;
        $edit->phone = $request->phone;
        $edit->email = $request->email;
        if (!empty($request->password)) {
            $edit->password = Hash::make($request->password);
        }

        $edit->update();
        session()->flash('upt');
        return redirect('staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        session()->flash('dlt');
        return back();
    }
}
