<x-layout>
    <h1 class='my-16 text-center text-3xl font-medium'>Увійдіть в аккаунт</h1>
    <x-card class='px-16 py-8'>
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class='mb-8'>
                <label for="email" class='mb-2 block text-sm font-medium'>E-mail</label>
                <x-text-input name="email" />
            </div>
            <div class='mb-8'>
                <label for="password" class='mb-2 block text-sm font-medium'>Пароль</label>
                <x-text-input name="password" type="password" />
            </div>

            <div class='mb-8 flex justify-between text-sm font-medium'>
                <div class='flex items-center gap-2'>
                    <input type="checkbox" id='remember' class='rounded-sm border border-slate-400'>
                    <label for="remember">Запам'ятати мене</label>
                </div>
                <a href="#" class='hover:underline'>Забули пароль?</a>
            </div>
            <x-button class='w-full bg-green-300'>Увійти</x-button>

        </form>
    </x-card>
</x-layout>
