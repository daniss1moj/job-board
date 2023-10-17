<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job board</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class='mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% text-slate-700'>
    <nav class='mb-8 flex justify-between text-lg font-medium'>
        <ul class='flex space-x-2'>
            <li class="{{ Route::currentRouteName() === 'jobs.index' ? 'text-blue-600' : '' }}">
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>
        </ul>
        <ul class='flex items-center space-x-3'>
            @auth()
                <li>
                    {{ auth()->user()->name ?? 'Guest' }}
                </li>
                <li class="{{ Route::currentRouteName() === 'my-job-applications.index' ? 'text-blue-600' : '' }}">
                    <a href="{{ route('my-job-applications.index') }}">
                        Applications
                    </a>
                </li>
                @if (auth()->user() !== null &&
                        auth()->user()->isEmployer())
                    <li class="{{ Route::currentRouteName() === 'my-jobs.index' ? 'text-blue-600' : '' }}">
                        <a href="{{ route('my-jobs.index') }}">
                            My Jobs
                        </a>
                    </li>
                @endif
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}">
                        Sign in
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
    @if (session('success'))
        <div class='my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-70'>
            <p class='font-bold'>Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class='my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-800 opacity-70'>
            <p class='font-bold'>Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
