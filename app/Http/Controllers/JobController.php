<?php

namespace Fraudr\Http\Controllers;


class JobController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        return view('job.list');
    }

    public function createForm()
    {

    }

    public function create()
    {

    }
}
