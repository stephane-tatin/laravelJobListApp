<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use Illuminate\Http\Request;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs.index', [
            "jobs" => Job::all(),
            "companies" => Company::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('jobs.create', [
            "companies" => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $company = explode(",", $request['company']);

        Job::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'companyId' => $company[0],
            'companyName' => $company[1],
            'type' => $request['type'],
            'createdBy' => $request->user()->name,
            'userId' => $request->user()->id,
        ]);


        return redirect("/jobs");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('jobs.show', [
            "job" => Job::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("jobs.edit", [
            "job" => Job::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Job::updateOrCreate([
            'id' => $id,
        ], [
            'title' => $request['title'],
            'description' => $request['description'],
            'company' => $request['company'],
            'type' => $request['type'],
        ]);

        return redirect('/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::findOrFail($id)->delete();

        return redirect("/jobs");
    }
}
