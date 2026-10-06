<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Job Posting') }}
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Add a new job opportunity to the hiring system.
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Job Details
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Fill in the information below to create the job posting.
                    </p>
                </div>

                <div class="p-6">

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200
                                    text-red-700 px-4 py-4 rounded-lg">

                            <p class="font-semibold mb-2">
                                Please correct the following errors:
                            </p>

                            <ul class="list-disc list-inside text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif

                    <form action="{{ route('admin.jobs.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="md:col-span-2">
                                <label for="title"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Job Title
                                </label>

                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="e.g. Web Developer"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-indigo-500 focus:ring-indigo-500"
                                >
                            </div>

                            <div class="md:col-span-2">
                                <label for="description"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Job Description
                                </label>

                                <textarea
                                    id="description"
                                    name="description"
                                    rows="6"
                                    placeholder="Describe the responsibilities, qualifications, and other details..."
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-indigo-500 focus:ring-indigo-500"
                                >{{ old('description') }}</textarea>
                            </div>

                            <div>
                                <label for="location"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Location
                                </label>

                                <input
                                    type="text"
                                    id="location"
                                    name="location"
                                    value="{{ old('location') }}"
                                    placeholder="e.g. Cagayan de Oro"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-indigo-500 focus:ring-indigo-500"
                                >
                            </div>

                            <div>
                                <label for="salary"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Salary
                                </label>

                                <div class="relative">
                                    <span class="absolute left-3 top-2.5 text-gray-500">
                                        ₱
                                    </span>

                                    <input
                                        type="number"
                                        id="salary"
                                        name="salary"
                                        value="{{ old('salary') }}"
                                        placeholder="25000"
                                        step="0.01"
                                        min="0"
                                        class="w-full rounded-lg border-gray-300
                                               pl-8 focus:border-indigo-500
                                               focus:ring-indigo-500"
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="deadline"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Application Deadline
                                </label>

                                <input
                                    type="date"
                                    id="deadline"
                                    name="deadline"
                                    value="{{ old('deadline') }}"
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-indigo-500 focus:ring-indigo-500"
                                >
                            </div>

                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100
                                    flex items-center justify-between">

                            <a href="{{ route('admin.jobs.index') }}"
                               class="px-4 py-2 text-sm font-medium text-gray-600
                                      bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="px-5 py-2.5 bg-gray-800 text-white
                                       rounded-lg text-sm font-semibold
                                       hover:bg-gray-700 transition"
                            >
                                Create Job Posting
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>