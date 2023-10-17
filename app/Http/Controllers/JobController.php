<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Job::class);
        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');

        if (request()->user()) {
            $jobs = Job::with('employer')->where('employer_id', '!=', request()->user()->employer->id)->filter($filters);
        } else {
            $jobs = Job::with('employer')->filter($filters);
        }

        return view('job.index', ['jobs' => $jobs->get()]);
    }

    public function show(Job $job)
    {
        $this->authorize('view', $job);
        return view('job.show', ['job' => $job->load('employer.jobs')]);
    }


}