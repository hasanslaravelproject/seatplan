<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeatClass;
use Illuminate\Http\Request;

class SeatClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seat_classes = SeatClass::latest()->get();
        return view('admin.pages.seatClasses', compact('seat_classes'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'name' => 'required|unique:seat_classes',
            'seat_color' => 'required',
        ]);

        SeatClass::create($request->all());

        //redirect
        Session()->flash('success', 'successfully Created !');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'seat_color' => 'required',
        ]);

        $seat_classes = SeatClass::find($request->id);
        $seat_classes->name = $request->name;
        $seat_classes->seat_color = $request->seat_color;
        $seat_classes->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        SeatClass::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }
}
