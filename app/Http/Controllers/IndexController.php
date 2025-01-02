<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use App\Models\Lot;
use App\Models\StatusLot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {

        $data["title"] = "Dashboard";
        return view("dashboard.admin.index", $data);
    }

    public function user()
    {
        $data["title"] = "User Management";
        $data["users"] = User::where('id_user', "!=", auth()->user()->id)->get();
        return view("dashboard.admin.user.index", $data);
    }

    public function createUser()
    {
        $data["title"] = "Add New User";
        return view("dashboard.admin.user.create", $data);
    }

    public function insertUser(Request $request)
    {
        $validated = $request->validate([
            "name_user" => "required|unique:users,name_user",
            "username_user" => "required|unique:users,username_user",
            "role" => "required",
            "password" => "required",
        ]);

        User::create($validated);

        return redirect('/users')->with("alert", "Succes add new user.");
    }

    public function viewEditUser(User $user)
    {
        $data["title"] = "Edit User";
        $data["user"] = $user;
        return view("dashboard.admin.user.edit", $data);
    }

    public function editUser(Request $request, User $user)
    {
        $validated = $request->validate([
            "name_user" => "required|unique:users,name_user",
            "username_user" => "required|unique:users,username_user",
            "role" => "required",
            "password" => "nullable",
        ]);

        if($request->input("password") == null) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($request->input("password"));
        }

        $user->update($validated);

        return redirect('/users')->with("alert", "Succes update data user.");
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect("/users")->with("alert", "Succes deleted user");
    }

    public function daily()
    {
        $data["title"] = "Daily";
        $data["dailies"] = Daily::with('lot')
            ->orderBy('date_daily', 'desc')
            ->get()
            ->groupBy('date_daily');
        return view("dashboard.admin.daily.index", $data);
    }

    public function createDaily()
    {
        $data["title"] = "Create Case";
        $data["lots"] = Lot::all();
        return view("dashboard.admin.daily.create", $data);
    }

    public function insertDaily(Request $request)
    {
        $validated = $request->validate([
            "name_user" => "required",
            "username_user" => "required",
            "date_daily" => "required",
            "lot_id" => "required"
        ]);

        foreach ($validated['lot_id'] as $value) {
            $daily = Daily::create([
                'name_user' => $validated['name_user'],
                'username_user' => $validated['username_user'],
                'date_daily' => $validated['date_daily'],
                'id_lot' => $value,
            ]);

            $lot = Lot::where("id_lot", $value)->first();

            for ($i = 1; $i <= 7; $i++) {
                StatusLot::create([
                    "id_lot" => $lot->id_lot,
                    "id_daily" => $daily->id_daily,
                    "name_case" => $lot->name_lot,
                    "name_lot" => "lot" . $i
                ]);
            }
        }

        return redirect('/daily')->with("alert", "Succes add new data daily.");
    }
    public function deleteDaily(Daily $daily)
    {
        $daily->delete();

        return redirect("/daily")->with("alert", "Succes deleted daily");
    }

    public function lot()
    {
        $data["title"] = "Lot";
        $data["lots"] = Lot::all();
        return view("dashboard.admin.lot.index", $data);
    }

    public function createLot()
    {
        $data["title"] = "Create Case";
        return view("dashboard.admin.lot.create", $data);
    }

    public function insertLot(Request $request)
    {
        $validated = $request->validate([
            "name_user" => "required",
            "username_user" => "required",
            "name_lot" => "required|unique:lots,name_lot",
            "lot1" => "required",
            "lot2" => "required",
            "lot3" => "required",
            "lot4" => "required",
            "lot5" => "required",
            "lot6" => "required",
            "lot7" => "required",
        ]);


        Lot::create($validated);

        return redirect('/lot')->with("alert", "Succes add new data lot.");
    }

    public function viewEditLot(Lot $lot)
    {
        $data["title"] = "Edit Case";
        $data["lot"] = $lot;
        return view("dashboard.admin.lot.edit", $data);
    }

    public function editLot(Request $request, Lot $lot)
    {
        $validated = $request->validate([
            "name_user" => "required",
            "username_user" => "required|unique:lots,name_lot",
            "name_lot" => "required",
            "lot1" => "required",
            "lot2" => "required",
            "lot3" => "required",
            "lot4" => "required",
            "lot5" => "required",
            "lot6" => "required",
            "lot7" => "required",
        ]);

        $lot->update($validated);

        return redirect('/lot')->with("alert", "Success edit data lot.");
    }


    public function deleteLot(Lot $lot)
    {
        $lot->delete();

        return redirect("/lot")->with("alert", "Succes deleted case");
    }

    public function sentStatus(StatusLot $status_lot)
    {
        $data = [
            "name_changed_status" => auth()->user()->username_user,
            "status_lot" => "Sent"
        ];

        $status_lot->update($data);

        return redirect("/daily")->with("alert", "Succes edit status case");
    }

    public function notAvailableStatus(StatusLot $status_lot)
    {
        $data = [
            "name_changed_status" => auth()->user()->username_user,
            "status_lot" => "Not Available"
        ];

        $status_lot->update($data);

        return redirect("/daily")->with("alert", "Succes edit status case");
    }

    public function pendingStatus(StatusLot $status_lot)
    {
        $data = [
            "name_changed_status" => auth()->user()->username_user,
            "status_lot" => "Pending"
        ];

        $status_lot->update($data);

        return redirect("/daily")->with("alert", "Succes edit status case");
    }

    public function updateName(Request $request, User $user)
    {
        $validated = $request->validate(['name_user' => 'required']);

        $user->update($validated);
        return redirect('/')->with("alert", "Success add full name.");
    }
}
