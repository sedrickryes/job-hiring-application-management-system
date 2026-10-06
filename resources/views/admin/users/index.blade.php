<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('User Management') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Manage system users and their assigned roles.
                </p>
            </div>

            <a href="{{ route('admin.users.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                      rounded-md font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                      transition ease-in-out duration-150">
                + Add User
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

            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800
                            px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">
                        System Users
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $users->count() }} total user(s)
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold
                                           text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold
                                           text-gray-500 uppercase tracking-wider">
                                    User
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold
                                           text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold
                                           text-gray-500 uppercase tracking-wider">
                                    Role
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-semibold
                                           text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                            @forelse($users as $user)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        #{{ $user->id }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="h-10 w-10 rounded-full bg-gray-800
                                                        flex items-center justify-center
                                                        text-white font-semibold">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>

                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">
                                                    {{ $user->name }}
                                                </div>
                                            </div>

                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        @if($user->role === 'admin')

                                            <span class="inline-flex items-center px-3 py-1
                                                         rounded-full text-xs font-semibold
                                                         bg-purple-100 text-purple-700">
                                                Administrator / HR
                                            </span>

                                        @else

                                            <span class="inline-flex items-center px-3 py-1
                                                         rounded-full text-xs font-semibold
                                                         bg-blue-100 text-blue-700">
                                                Applicant
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">

                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="text-indigo-600 hover:text-indigo-900
                                                  font-medium mr-4">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.users.destroy', $user) }}"
                                            method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-900
                                                           font-medium">
                                                Delete
                                            </button>
                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5"
                                        class="px-6 py-12 text-center text-gray-500">
                                        No users found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>