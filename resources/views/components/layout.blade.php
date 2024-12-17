@props([
    'title',
    'metaDescription'
])


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{ $metaDescription }}">
    <title>{{ $title }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class='px-4 sm:p-0 mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-400  to-indigo-900 text-white'>
    <nav class='mb-8 flex justify-between text-lg font-medium'>
        <ul class='flex space-x-2'>
            <li class="{{ Route::currentRouteName() === 'jobs.index' ? 'text-indigo-900' : '' }}">
                <a href="{{ route('jobs.index') }}">Головна</a>
            </li>
        </ul>
        <ul class='flex items-center space-x-3'>
            @auth()
                <li>
                    {{ auth()->user()->name ?? 'Гість' }}
                </li>
                <li class="{{ Route::currentRouteName() === 'my-job-applications.index' ? 'text-indigo-400' : '' }}">
                    <a href="{{ route('my-job-applications.index') }}">
                        Відгуки
                    </a>
                </li>
                @if (auth()->user() !== null &&
                        auth()->user()->isEmployer())
                    <li class="{{ Route::currentRouteName() === 'my-jobs.index' ? 'text-indigo-400' : '' }}">
                        <a href="{{ route('my-jobs.index') }}">
                            Мої вакансії
                        </a>
                    </li>
                @endif
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>
                            Вийти
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}">
                        Увійти
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
    @if (session('success'))
        <div class='my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-70'>
            <p class='font-bold'>Успішно!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class='my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-800 opacity-70'>
            <p class='font-bold'>Помилка!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
