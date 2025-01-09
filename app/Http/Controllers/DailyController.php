<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use App\Http\Requests\UpdateDailyRequest;
use App\Models\Lot;
use App\Models\StatusLot;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Daily";
        $data["dailies"] = Daily::orderBy('date_daily', 'desc')
        ->get()
        ->groupBy('date_daily');


        return view("daily.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Create Case";
        $data["lots"] = Lot::all();

        return view("daily.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "date_daily" => "required",
            "id_lot" => "required"
        ]);

        $date = DateTime::createFromFormat('d/m/Y', $validated['date_daily']);

        foreach ($validated['id_lot'] as $value) {
            $daily = Daily::create([
                'date_daily' => $date->format('Y-m-d'),
                'id_user' => auth()->user()->id_user,
                'id_lot' => $value,
            ]);

            $lot = Lot::where("id_lot", $value)->first();
            for ($i = 1; $i <= 7; $i++) {
                StatusLot::create([
                    "id_lot" => $lot->id_lot,
                    "id_daily" => $daily->id_daily,
                    "name_case" => $lot->name_lot,
                    "case" => "Case " . $i,
                    'changed_by' => auth()->user()->id_user
                ]);
            }
        }

        return redirect('/daily')->with("alert", "Berhasil tambah data daily.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Daily $daily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daily $daily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDailyRequest $request, Daily $daily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daily $daily)
    {
        $daily->delete();

        return redirect("/daily")->with("alert", "Berhasil menghapus data daily.");
    }
}
