<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use App\Employee;

class ShiftController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Shift::all();
        return $data;
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
        $shift = new Shift;
        $shift->shiftStart  = $request->shiftStart;
        $shift->shiftEnd    = $request->shiftEnd;
        $shift->startTime   = $request->startTime;
        $shift->endTime     = $request->endTime;
        $shift->empID       = $request->empID;
        $shift->save();

        return 'Saved';
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

    public function weekly($date)
    {
        // $monday = date('d.m.Y', strtotime('monday this week'));
        // $friday = date('d.m.Y', strtotime('friday this week'));
        $shifts = Shift::with('employee');
        $shifts = $shifts->where('shiftStart', '=', $date)->get();
                    // ->where('shiftEnd', '<=', $friday)->get();

        return $shifts;
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
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return 'Deleted';
    }
}
