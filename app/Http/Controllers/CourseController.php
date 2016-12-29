<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use App\Year;
use Illuminate\Http\Request;
use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::paginate(25);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $periods = $this->getPeriods();

        return view('admin.courses.create', compact('periods'));
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
        
        $course = new Course();
        $course->course = $requestData['course'];
        $course->description = $requestData['description'];
        $course->completed = $requestData['completed'];
        $course->grade = $requestData['grade'];
        $course->save();

        $course->period()->sync([$requestData['period']]);

        Session::flash('flash_message', 'Course added!');

        return redirect('admin/courses');
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
        $course = Course::findOrFail($id);

        return view('admin.courses.show', compact('course'));
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
        $course = Course::findOrFail($id);
        $periods = $this->getPeriods();

        return view('admin.courses.edit', compact('course', 'periods'));
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
        
        $course = Course::findOrFail($id);
        $course->update($requestData);

        $course->period()->sync([$requestData['period']]);

        Session::flash('flash_message', 'Course updated!');

        return redirect('admin/courses');
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
        Course::destroy($id);

        Session::flash('flash_message', 'Course deleted!');

        return redirect('admin/courses');
    }

    private function getPeriods(){
        $years = Year::all();
        $periods = [];
        foreach ($years as $year) {
            $periods[$year->year] = [];
            foreach ($year->periods as $period) {
               $periods[$year->year][$period->id] = $period->period;
            }
        }

        return $periods;
    }
}
