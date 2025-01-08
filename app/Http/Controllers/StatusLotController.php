<?php

namespace App\Http\Controllers;

use App\Models\StatusLot;
use App\Http\Requests\StoreStatusLotRequest;
use App\Http\Requests\UpdateStatusLotRequest;
use Illuminate\Http\Request;

class StatusLotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusLotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusLot $statusLot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusLot $statusLot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($status, Request $request, StatusLot $statusLot)
    {
        if($status == 'terkirim') {
            $statusLot->update(['changed_by' => auth()->user()->id_user, 'status' => 'Terkirim']);
        } else if($status == 'belumtersedia') {
            $statusLot->update(['changed_by' => auth()->user()->id_user, 'status' => 'Belum Tersedia']);
        } else if($status == 'pending') {
            $statusLot->update(['changed_by' => auth()->user()->id_user, 'status' => 'Pending']);
        }

        return redirect('/')->with("alert", "Berhasil edit status dialy.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusLot $statusLot)
    {
        //
    }
}
