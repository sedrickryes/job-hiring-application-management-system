<x-admin-layout>

    <x-slot name="header">
        Edit Job Posting
    </x-slot>

    <div class="max-w-4xl mx-auto">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">
                Edit Job Posting
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Update the information for this job opportunity.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100">

            <div class="px-6 py-5 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">
                    Job Details
                </h3>
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

                <form action="{{ route('admin.jobs.update', $job) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Job Title -->
                        <div class="md:col-span-2">

                            <label for="title"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Job Title
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title', $job->title) }}"
                                required
                                class="w-full rounded-lg border-gray-300
                                       focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">

                            <label for="description"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Job Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="6"
                                required
                                class="w-full rounded-lg border-gray-300
                                       focus:border-indigo-500 focus:ring-indigo-500"
                            >{{ old('description', $job->description) }}</textarea>

                        </div>

                        <!-- Location -->
                        <div>

                            <label for="location"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Location
                            </label>

                            <input
                                type="text"
                                id="location"
                                name="location"
                                value="{{ old('location', $job->location) }}"
                                required
                                class="w-full rounded-lg border-gray-300
                                       focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Salary -->
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
                                    value="{{ old('salary', $job->salary) }}"
                                    step="0.01"
                                    min="0"
                                    class="w-full rounded-lg border-gray-300 pl-8
                                           focus:border-indigo-500 focus:ring-indigo-500"
                                >

                            </div>

                        </div>

                        <!-- Deadline -->
                        <div>

                            <label for="deadline"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Application Deadline
                            </label>

                            <input
                                type="date"
                                id="deadline"
                                name="deadline"
                                value="{{ old('deadline', $job->deadline) }}"
                                class="w-full rounded-lg border-gray-300
                                       focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                    </div>

                    <!-- Buttons -->
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
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-admin-layout>