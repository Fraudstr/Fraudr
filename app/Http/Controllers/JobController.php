<?php

namespace Fraudr\Http\Controllers;


use Fraudr\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(Request $request)
    {
        $search = $request->search;
        $jobs = Job::with('user')->orderBy('updated_at', 'desc')->paginate(15);
        return view('job.list', compact('jobs', 'search'));
    }

    public function show(Job $job)
    {

    }

    public function create()
    {

    }

    public function showCreateForm()
    {
        return view('job.create');
    }
}
