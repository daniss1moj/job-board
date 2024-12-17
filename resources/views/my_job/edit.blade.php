<x-layout>
    <h1 class="text-2xl font-bold mb-4">Редагувати вакансію</h1>
    <x-breadcrumbs :links="[
        'Mої вакансії' => route('my-jobs.index'),
        'Редагувати' => '#',
    ]" class='mb-4' />
    <x-card class='mb-8'>
        <form action="{{ route('my-jobs.update', $job) }}" method="POST">
            @csrf
            @method('put')
            <div class='mb-4 grid grid-cols-2 gap-4'>
                <div>
                    <x-label for="title" :required="true">Назва вакансії</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Локація</x-label>
                    <x-text-input name="location" :value="$job->location" />
                </div>
                <div class='col-span-2'>
                    <x-label for="salary" :required="true">Заробітна плата</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>
                <div class='col-span-2'>
                    <x-label for="description" :required="true">Опис</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description" />
                </div>
                <div>
                    <x-label for="experience" :required="true">
                        Досвід
                    </x-label>
                    <x-radio-group name="experience" :value="$job->experience" :options="\App\Models\Job::$experience" :allOption="false">
                    </x-radio-group>
                </div>
                <div>
                    <x-label for="category" :required="true">
                        Категорія
                    </x-label>
                    <x-radio-group name="category" :value="$job->category" :options="\App\Models\Job::$category" :allOption="false">
                    </x-radio-group>
                </div>
                <div class='col-span-2'>
                    <x-button class='w-full'>Редагувати вакансію</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
