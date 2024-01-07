<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\rombels;
use App\Models\rayons;
use App\Models\students;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $students = Students::all();
            $rayon = Rayons::all();
            $rombel = Rombels::all();
            return view('student.index', compact('students', 'rayon', 'rombel'));
            
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = rombels::all();
        $rayons = rayons::all();
        $users = users::all();
        return view('student.create', compact('rayons', 'users', 'rombels'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
        $request->validate([
        'nis' => 'required',
        'name' => 'required',
        'rombel_id' => 'required|string',
        'rayon_id' => 'required|string',
    ]);


    Students::create([
        'nis' => $request->nis,
        'name' => $request->name,
        'rombel_id' => $request->rombel_id,
        'rayon_id' => $request->rayon_id,
    ]);


        return redirect()->back()->with('success', 'Berhasil menambahkan data student!');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = students::find($id);
        $rombels = rombels::all();
        $rayons = rayons::all();
        return view('student.edit', compact('students', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required'
        ]);

        students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id

        ]);

        return redirect()->route('rayon.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        students::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
