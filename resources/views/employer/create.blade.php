<x-layout>
    <h1>Створити команію</h1>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <x-label for="company_name" :required="true">
                Назва компанії
            </x-label>
            <x-text-input name="company_name" id="company_name" />
            <x-button class='mt-2 w-full'>
                Створити
            </x-button>
        </form>
    </x-card>
</x-layout>
