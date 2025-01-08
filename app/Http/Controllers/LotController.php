<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Lot';
        $data['lots'] = Lot::all();

        return view('lot.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Create Lot";

        return view("lot.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name_lot" => "required|unique:lots,name_lot",
            "case1" => "required",
            "case2" => "required",
            "case3" => "required",
            "case4" => "required",
            "case5" => "required",
            "case6" => "required",
            "case7" => "required",
        ]);

        $validated['name_made'] = auth()->user()->name;
        $validated['role_made'] = auth()->user()->role;
        $validated['name_change'] = auth()->user()->name;
        $validated['role_change'] = auth()->user()->role;

        Lot::create($validated);

        return redirect('/lot')->with("alert", "Berhasil tambah data lot.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Lot $lot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lot $lot)
    {
        $data["title"] = "Edit Lot";
        $data["lot"] = $lot;

        return view("lot.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lot $lot)
    {
        $validated = $request->validate([
            "name_lot" => [
                "required",
                Rule::unique('lots', 'name_lot')->ignore($lot->id_lot, 'id_lot')
            ],
            "case1" => "required",
            "case2" => "required",
            "case3" => "required",
            "case4" => "required",
            "case5" => "required",
            "case6" => "required",
            "case7" => "required",
        ]);

        $validated['name_change'] = auth()->user()->name;
        $validated['role_change'] = auth()->user()->role;

        $lot->update($validated);

        return redirect('/lot')->with("alert", "Berhasil edit data lot.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lot $lot)
    {
        $lot->delete();

        return redirect("/lot")->with("alert", "Berhasil menghapus data lot.");
    }
}
