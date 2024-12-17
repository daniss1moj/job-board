<x-layout>
    <h1 class="text-2xl font-bold mb-4">Створити вакансію</h1>
    <x-breadcrumbs :links="[
        'Мої вакансії' => route('my-jobs.index'),
        'Створити' => '#',
    ]" class='mb-4' />
    <x-card class='mb-8'>
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf
            <div class='mb-4 grid grid-cols-2 gap-4'>
                <div>
                    <x-label for="title" :required="true">Назва вакансії</x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Локація</x-label>
                    <x-text-input name="location" />
                </div>
                <div class='col-span-2'>
                    <x-label for="salary" :required="true">Заробітна плата</x-label>
                    <x-text-input name="salary" type="number" />
                </div>
                <div class='col-span-2'>
                    <x-label for="description" :required="true">Опис</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>
                <div>
                    <x-label for="experience" :required="true">
                        Досвід
                    </x-label>
                    <x-radio-group name="experience" :value="old('experience')" :options="\App\Models\Job::$experience" :allOption="false">
                    </x-radio-group>
                </div>
                <div>
                    <x-label for="category" :required="true">
                        Категорія
                    </x-label>
                    <x-radio-group name="category" :value="old('category')" :options="\App\Models\Job::$category" :allOption="false">
                    </x-radio-group>
                </div>
                <div class='col-span-2'>
                    <x-button class='w-full'>Створити вакансію</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
