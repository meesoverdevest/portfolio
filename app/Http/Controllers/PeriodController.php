<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Period;
use App\Year;
use Illuminate\Http\Request;
use Session;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $periods = Period::paginate(25);

        return view('admin.periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $years = Year::pluck('year', 'id');
        return view('admin.periods.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        $period = new Period();
        $period->period = $requestData['period'];
        $period->year_id = $requestData['year_id'];
        $period->save();

        Session::flash('flash_message', 'Period added!');

        return redirect('admin/periods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $period = Period::findOrFail($id);

        return view('admin.periods.show', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $period = Period::findOrFail($id);

        return view('admin.periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $period = Period::findOrFail($id);
        $period->update($requestData);

        Session::flash('flash_message', 'Period updated!');

        return redirect('admin/periods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Period::destroy($id);

        Session::flash('flash_message', 'Period deleted!');

        return redirect('admin/periods');
    }
}
