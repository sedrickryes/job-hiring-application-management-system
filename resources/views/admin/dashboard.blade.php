<x-admin-layout>

    <x-slot name="header">
        Administrator / HR Dashboard
    </x-slot>

    <div>
        <h1 class="welcome-title">
            Welcome, {{ request()->user()->name }}!
        </h1>

        <p class="welcome-text">
            Manage users, job postings, and applications from one place.
        </p>
    </div>

    <div class="dashboard-grid">

        <!-- USERS -->
        <a href="{{ route('admin.users.index') }}"
           class="dashboard-card">

            <div class="card-top">
                <div>
                    <div class="card-label">System Users</div>

                    <div class="card-number">
                        {{ \App\Models\User::count() }}
                    </div>
                </div>

                <div class="card-icon">
                    👥
                </div>
            </div>

            <div class="card-link">
                Manage Users →
            </div>

        </a>

        <!-- JOBS -->
        <a href="{{ route('admin.jobs.index') }}"
           class="dashboard-card">

            <div class="card-top">
                <div>
                    <div class="card-label">Job Postings</div>

                    <div class="card-number">
                        {{ \App\Models\Job::count() }}
                    </div>
                </div>

                <div class="card-icon">
                    💼
                </div>
            </div>

            <div class="card-link">
                Manage Jobs →
            </div>

        </a>

        <!-- APPLICATIONS -->
        <div class="dashboard-card">

            <div class="card-top">
                <div>
                    <div class="card-label">Applications</div>

                    <div class="card-number">
                        0
                    </div>
                </div>

                <div class="card-icon">
                    📋
                </div>
            </div>

            <div class="card-link" style="color: #6b7280;">
                Application management coming next
            </div>

        </div>

    </div>

    <!-- WEATHER -->
<div class="dashboard-card">

    <div class="card-top">
        <div>
            <div class="card-label">Weather</div>

            @if($weather['success'])
                <div class="card-number" style="font-size: 1.5rem;">
                    {{ round($weather['weather']['temperature']) }}°C
                </div>
            @else
                <div class="card-number" style="font-size: 1rem; color: #6b7280;">
                    Unavailable
                </div>
            @endif
        </div>

        <div class="card-icon">
            🌤️
        </div>
    </div>

    @if($weather['success'])
        <div style="font-size: 0.875rem; color: #374151; line-height: 1.6; margin-top: 0.5rem;">
            <div>{{ $weather['weather']['location'] }}</div>
            <div style="text-transform: capitalize;">{{ $weather['weather']['condition'] }}</div>
            <div>Humidity: {{ $weather['weather']['humidity'] }}%</div>
            <div>Wind: {{ $weather['weather']['wind_speed'] }} m/s</div>
        </div>
    @else
        <div class="card-link" style="color: #6b7280;">
            {{ $weather['message'] }}
        </div>
    @endif

</div>

</x-admin-layout>