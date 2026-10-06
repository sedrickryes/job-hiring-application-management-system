<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-semibold mb-2">
                        Welcome, {{ request()->user()->name }}!
                    </h3>

                    <p class="mb-6">
                        You are logged in as Applicant.
                    </p>

                    <div class="flex gap-4">

                        <a href="#"
                           class="px-4 py-2 bg-gray-800 text-white rounded">
                            View Available Jobs
                        </a>

                        <a href="#"
                           class="px-4 py-2 bg-gray-800 text-white rounded">
                            My Applications
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>