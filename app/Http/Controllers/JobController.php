<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('jobs.create', [
            'categories' => $categories,
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
        // dd($request->all());

        // validasi data
        $validateData = $request->validate([
            'job_title' => ['required'],
            'company' => ['required'],
            'category' => ['required'],
            'location' => ['required'],
            'salary' => ['required', 'numeric'],
            'contact_phone' => ['required'],
            'contact_email' => ['required', 'email'],
            'description' => ['required']
        ]);
        
        $job = new Job();
        $job->user_id = \Auth::user()->id;
        $job->url = Str::random(10);
        $job->category_id = $request->category;
        $job->job_title = $request->job_title;
        $job->company = $request->company;;
        $job->location = $request->location;
        $job->salary = $request->salary;
        $job->contact_phone = $request->contact_phone;
        $job->contact_email = $request->contact_email;
        $job->description = $request->description;
        $job->save();

        return redirect('/');

        // buat flash message nya nnti
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $detail = Job::where('url', $url)->first();
        $proposals = Proposal::where('job_id', $detail->id )->get();
        // dd($detail);
        // dd($proposals);

        return view('jobs.detail', [
            'detail' => $detail,
            'proposals' => $proposals
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
