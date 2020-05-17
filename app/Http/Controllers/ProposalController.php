<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
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
    public function create($url)
    {
        $job = Job::where('url', $url)->first();
        
        // dd($job);
        return view('proposals.create', [
            'job' => $job
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
        $validateData = $request->validate([
            'description' => ['required'],
            'file' => ['required', 'mimes:pdf', 'max:1024']
        ]);
        $job = Job::findOrFail($request->job_id);
        $job_url = $job->url;

        // dd($request->all());
        $filePath = (request('file')->store('files', 'public'));

        $proposal = new Proposal();
        $proposal->user_id = \Auth::user()->id;
        $proposal->job_id = $request->job_id;
        $proposal->description = $request->description;
        $proposal->file = $filePath;
        $proposal->save();

        // return back()->with('status', 'The job has been applied');
        return redirect()
                ->route('job.show', $job_url)
                ->with('status', 'The job has been applied');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::findOrFail($id);
        // dd($proposal);

        return view('proposals.detail', [
            'proposal' => $proposal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}
