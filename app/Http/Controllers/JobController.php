<?php

namespace Fraudr\Http\Controllers;


use Carbon\Carbon;
use DateTime;
use Fraudr\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Exception\NotFoundException;

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
        $jobs = Job::with('user')->where('closes_at', '>=', Carbon::now())->orderBy('updated_at', 'desc')->paginate(15);
        return view('job.list', compact('jobs', 'search'));
    }

    public function show(Job $job)
    {
        if($job->closes_at < Carbon::now()) {
            return redirect(route('job.list'));
        }

        return view('job.show', compact('job'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required|string|max:191',
            'description'   => 'required|string',
            'bounty'        => 'required|numeric|credits',
            'closes_at'     => 'required|date|date_format:Y/m/d',
        ]);

        $user = Auth::user();
        $user->credits -= $request->bounty;
        $user->save();

        $closes_at = DateTime::createFromFormat('Y/m/d', $request->closes_at);
        $job = Job::create([
            'user_id'       => $user->id,
            'title'         => $request->title,
            'description'   => $request->description,
            'bounty'        => $request->bounty,
            'closes_at'     => $closes_at,
        ]);

        return redirect(route('job.show', $job->id));
    }

    public function showCreateForm()
    {
        return view('job.create');
    }
}
