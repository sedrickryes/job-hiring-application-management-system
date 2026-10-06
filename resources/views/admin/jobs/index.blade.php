<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Job Management') }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Create and manage available job opportunities.
                </p>
            </div>

            <a href="{{ route('admin.jobs.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                      rounded-md font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-gray-700 transition">
                + Post a Job
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800
                            px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Available Job Postings
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $jobs->count() }} job posting(s)
                    </p>
                </div>

                <div class="p-6">

                    @forelse($jobs as $job)

                        <div class="border border-gray-200 rounded-xl p-5 mb-4
                                    hover:shadow-md transition">

                            <div class="flex flex-col md:flex-row md:items-start
                                        md:justify-between gap-4">

                                <div class="flex-1">

                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $job->title }}
                                    </h3>

                                    <div class="mt-2 text-sm text-gray-500">
                                        📍 {{ $job->location }}
                                    </div>

                                    @if($job->salary)
                                        <div class="mt-1 text-sm text-gray-600">
                                            💰 ₱{{ number_format($job->salary, 2) }}
                                        </div>
                                    @endif

                                    @if($job->deadline)
                                        <div class="mt-1 text-sm text-gray-500">
                                            📅 Deadline:
                                            {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}
                                        </div>
                                    @endif

                                    <p class="mt-4 text-sm text-gray-600">
                                        {{ \Illuminate\Support\Str::limit($job->description, 180) }}
                                    </p>

                                </div>

                                <div class="flex items-center gap-3">

                                    <a href="{{ route('admin.jobs.edit', $job) }}"
                                       class="px-4 py-2 text-sm font-medium
                                              text-indigo-600 bg-indigo-50 rounded-lg
                                              hover:bg-indigo-100 transition">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.jobs.destroy', $job) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this job posting?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-2 text-sm font-medium
                                                       text-red-600 bg-red-50 rounded-lg
                                                       hover:bg-red-100 transition">
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-12">

                            <div class="text-4xl mb-4">
                                💼
                            </div>

                            <h3 class="text-lg font-semibold text-gray-900">
                                No job postings yet
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Create your first job posting to get started.
                            </p>

                            <a href="{{ route('admin.jobs.create') }}"
                               class="inline-flex mt-5 px-4 py-2 bg-gray-800
                                      text-white rounded-md text-sm font-medium
                                      hover:bg-gray-700 transition">
                                Create Job Posting
                            </a>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>
    </div>

</x-app-layout>