<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


class SchoolImport extends Controller
{


    public function index()
    {
        
        return view('importSchool');
    }

    public function familyImport(Request $request)
    {
        dd($request->all());
        $file = Input::file('familyCsv');
        $ext = $file->getClientOriginalExtension();
        if (Input::hasFile('familyCsv')) {
            $path = Input::file('familyCsv')->getRealPath();

            $data = \Excel::load(
                $path,
                function ($reader) {
                }
            )->get();
            dd($data);
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {

                    $user = User::find($value->id);
                    if ($user != null) {
                        continue;
                    }
                    $user = new User;
                    $user->id = $value->id;
                    $user->first_name = $value->first_name;
                    $user->last_name = $value->last_name;
                    $user->address = $value->address;
                    $user->address_2 = $value->address_2;
                    $user->city = $value->city;
                    $user->state = $value->state;
                    $user->zip = $value->zip;
                    $user->phone = $value->phone;
                    $user->mobile = $value->mobile;
                    $user->email = $value->email;
                    $user->exempt = $value->exempt;
                    $user->exempt_reason = $value->exempt_reason;
                    $user->note = $value->note;
                    $user->password = bcrypt($value->password);

                    if ($value->head == "head") {
                        $user->head_id = $value->id;
                    }
                    if ($value->status == "active") {
                        $user->status = "1";
                    } else {
                        $user->status = "0";
                    }
                    $user->save();
                    // $insert['0'] = ['id' => $value->id, 'first_name' => $value->first_name, 'last_name' => $value->last_name, 'address' => $value->address, 'address_2' => $value->address_2, 'city' => $value->city, 'state' => $value->state, 'zip' => $value->zip, 'phone' => $value->phone, 'mobile' => $value->mobile, 'email' => $value->email, 'password' => $value->password, 'status' => '1', 'exempt' => $value->exempt_reason, 'confirm' => '1', 'note' => $value->note];
                    // $user[$count] = $user[$count]->toArray();

                }

            }

        }
        return redirect()->back()->withFlashSuccess('Date has been import Successfilly');
    }

    public function schoolImport()
    {

        $file = Input::file('familyCsv');
        $ext = $file->getClientOriginalExtension();
        if (Input::hasFile('familyCsv')) {
            $path = Input::file('familyCsv')->getRealPath();

            $data = \Excel::load(
                $path,
                function ($reader) {
                }
            )->get();
            // dd($data);
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $e = Event::where('id', $value->id)->first();
                    if ($e != null) {
                        continue;
                    }
                    $start_date = \Carbon\Carbon::Parse($value->start_date)->format('Y/m/d');
                    $start_time = \Carbon\Carbon::Parse($value->start_time)->format('h:i A');
                    $end_time = \Carbon\Carbon::Parse($value->end_time)->format('h:i A');
                    $event = new Event;
                    $event->id = $value->id;
                    $event->start = \Carbon\Carbon::Parse($start_date . ' ' . $start_time);
                    $event->end = \Carbon\Carbon::Parse($start_date . ' ' . $end_time);
                    $service = $this->events->calculateServiceHours($start_time, $end_time);
                    $event->services_hours = $service;
                    if ($value->type == "lunch") {
                        $schoolCheck = $this->events->schoolDayCheck($start_date);
                        if ($schoolCheck == null) {
                            continue;
                        }

                        $type = $this->events->dayType($value->day_type);
                        $event->types_id = $type->id;
                        $event->schooldays_id = $schoolCheck->id;
                    }
                    $event->color = $value->color;
                    $event->available_resources = $value->available_resources;
                    $event->save();

                }

            }

        }
        return redirect()->back()->withFlashSuccess('Date has been import Successfilly');
    }

    public function exportBuyout()
    {
        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Teacher');
            }
        )->with('userCom.comEvents')->get();
        // dd($users);
        $totaleHours = 0;
        $completionHours = 0;
        $pendingHours = 0;
        $tH = "tH";
        $b = "balance";
        $c = "complete";
        $p = "pending";
        foreach ($users as $user) {
            $total = 0;
            $complete = 0;
            $pending = 0;
            $balance = 0;
            foreach ($user->userCom as $userCom) {
                $total = $total + $userCom->comEvents->services_hours;
                $totaleHours += $userCom->comEvents->services_hours;

                if ($userCom->status == "completion") {
                    $complete = $complete + $userCom->comEvents->services_hours;
                    $completionHours += $userCom->services_hours;
                } elseif ($userCom->status == "noshow") {
                    $pending = $pending + $userCom->comEvents->services_hours;
                    $balance = $balance + $userCom->services_hours * 30;
                    $pendingHours += $userCom->services_hours;
                } else {
                    $pendingHours += $userCom->services_hours;
                }
            }
            $user->$b = $balance;
            $user->$c = $complete;
            $user->$p = $pending;
            $user->$tH = $total;
        }
        $users = $users->toArray();
        foreach ($users as $user) {
            $userBuy[] = array_except($user, ['user_com']);

        }
        // $user = $user->toArray();
        return Excel::create(
            'buyOut',
            function ($excel) use ($userBuy) {
                $excel->sheet(
                    'mySheet',
                    function ($sheet) use ($userBuy) {
                        $sheet->fromArray($userBuy);
                    }
                );
            }
        )->download('csv');
        dd($users);
    }

    // Demo
    public function getCustomFilter()
    {
        return view('backend.Test.listTest');
    }

    public function getCustomFilterData(Request $request)
    {
        $users = User::select(['id', 'first_name', 'email', 'created_at', 'updated_at'])->get();

        return Datatables::of($users)
        ->filter(
            function ($instance) use ($request) {
                dd($request->all());
                if ($request->has('year')) {
                    $instance->collection = $instance->collection->filter(
                        function ($row) use ($request) {
                            return Str::contains($row['year'], $request->get('schoolYear_id')) ? true : false;
                        }
                    );
                }

                if ($request->has('email')) {
                    $instance->collection = $instance->collection->filter(
                        function ($row) use ($request) {
                            return Str::contains($row['email'], $request->get('email')) ? true : false;
                        }
                    );
                }
            }
        )
        ->make(true);
    }
    // Demo
}
