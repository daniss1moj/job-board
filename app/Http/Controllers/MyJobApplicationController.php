<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\User;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = request()->user()->jobApplications()->with(['job' => fn($query) => $query->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary')->withTrashed(), 'job.employer'])->latest()->get();

        $title = "Відгуки на вакансії | Huntberry";
        $metaDescription = "Відгуки на вакансії, пошук роботи в Україні - Huntberry";

        return view('my_job_application.index', compact('applications', 'title', 'metaDescription'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {

        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Job Application removed!');
    }
}
