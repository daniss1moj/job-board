<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        $jobs = auth()->user()->employer->jobs()->with('employer', 'jobApplications', 'jobApplications.user')->withTrashed()->get();

        $title = "Мої вакансії | Huntberry";
        $metaDescription = 'Мої вакансії, пошук роботи в Україні - Huntberry';

        return view('my_job.index', compact('jobs', 'title', 'metaDescription'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Job::class);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'category' => 'required|in:' . implode(',', Job::$category),
        ]);

        auth()->user()->employer->jobs()->create($validatedData);

        return redirect()->route('my-jobs.index')->with('success', 'Job was created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'category' => 'required|in:' . implode(',', Job::$category),
        ]);

        $myJob->update($validatedData);

        return redirect()->route('my-jobs.index')->with('success', 'Job was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        $myJob->delete();

        return redirect()->route('my-jobs.index')->with('success', 'Job was deleted!');
    }
}
