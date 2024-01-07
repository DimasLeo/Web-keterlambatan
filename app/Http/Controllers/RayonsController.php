<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User;
use App\Models\rayons;
use App\Models\users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $rayons = rayons::all();
            $users = users::all();
            return view('rayon.index', compact('rayons', 'users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = rayons::all();
        $users = users::all();
        return view('rayon.create', compact('rayons', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        rayons::create([

            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data user!');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayons $rayons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayons = Rayons::find($id);
        $users = Users::all()->where('role', 'ps');
        return view('rayon.edit', compact('rayons', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'rayon' => 'required',
            'user_id' => 'required',
            
        ]);
        

        rayons::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.index')->with('success', 'Berhasil mengubah data!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        rayons::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
