<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'deadline' => 'nullable|date',
        ]);

        Job::create($validated);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job posting created successfully.');
    }

    public function show(Job $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'deadline' => 'nullable|date',
        ]);

        $job->update($validated);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job posting updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job posting deleted successfully.');
    }
}