<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Assignment;
use App\Course;
use Illuminate\Http\Request;
use Session;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($course_id)
    {
        $course = Course::findOrFail($course_id);

        $assignments = $course->assignments;

           

        return view('admin.assignments.index', compact('assignments', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($course_id)
    {
        $course = Course::findOrFail($course_id);
        $extra_assignments = Assignment::paginate(25); 

        return view('admin.assignments.create', compact('course', 'extra_assignments'));
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
        $course = Course::findOrFail($request->get('course_id'));
        $ass = new Assignment();
        $ass->assignment = $request->get('assignment');
        $ass->description = $request->get('description');
        $ass->save();

        $course->assignments()->attach([$ass->id]);

        Session::flash('flash_message', 'Assignment added!');

        return redirect()->route('assignments', $course->id);
    }

    public function assign(Request $request)
    {
        $course = Course::findOrFail($request->get('course_id'));
        $assignments = $request->get('assignments');

        // $k = assignment ID
        // $v = yes (1) or no (2)
        foreach ($assignments as $k => $v) {
            if($v == 1) {
                // Check if assignment is already attached
                if(!$course->assignments->contains($k)){
                    $course->assignments()->attach([$k]);        
                }
            }
            
        }

        return redirect()->route('assignments', $course->id);
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
        $assignment = Assignment::findOrFail($id);

        return view('admin.assignments.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($course_id, $assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id);
        $course = Course::findOrFail($course_id);

        return view('admin.assignments.edit', compact('assignment', 'course'));
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
        $course = Course::findOrFail($request->get('course_id'));
        $requestData = $request->all();
        
        $assignment = Assignment::findOrFail($id);
        $assignment->update($requestData);

        Session::flash('flash_message', 'Assignment updated!');

        return redirect()->route('assignments', $course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($assignment_id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $course->assignments()->detach([$assignment_id]);

        Session::flash('flash_message', 'Assignment deleted!');

        return redirect()->route('assignments', $course->id);
    }
}
