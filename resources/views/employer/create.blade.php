<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <x-label for="company_name" :required="true">
                Company Name
            </x-label>
            <x-text-input name="company_name" id="company_name" />
            <x-button class='mt-2 w-full'>
                Create
            </x-button>
        </form>
    </x-card>
</x-layout>
