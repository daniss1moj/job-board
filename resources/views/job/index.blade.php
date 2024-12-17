<x-layout>
    <h1 class="text-2xl font-bold mb-4"><span class="text-indigo-900 text-3xl">Huntberry</span> - Сайт для пошуку роботи в Україні</h1>
    <x-breadcrumbs :links="['Вакансії' => route('jobs.index')]" class='mb-4'>
    </x-breadcrumbs>
    @php
        $search = request('search');
        $minSalary = request('min_salary');
        $maxSalary = request('max_salary');
        $experience = request('experience');
    @endphp
    <x-card class='mb-4 text-sm' x-data="">
        <form x-ref="filters" id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
            <div class='mb-4 grid grid-cols-2 gap-4'>
                <div>
                    <div class='mb-1 font-semibold'>Пошук</div>
                    <x-text-input name='search' value='{{ $search }}' placeholder='Знайти роботу'
                        form-id='filtering-form' form-ref="filters"></x-text-input>
                </div>
                <div>
                    <div class='mb-1 font-semibold'>Заробітна плата</div>
                    <div class='flex space-x-2'>
                        <x-text-input name='min_salary' value='{{ $minSalary }}' placeholder='від'></x-text-input>
                        <x-text-input name='max_salary' value='{{ $maxSalary }}' placeholder='до'></x-text-input>
                    </div>
                </div>
                <div>
                    <div class='mb-1 font-semibold'>Досвід</div>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experience" />
                </div>
                <div>
                    <div class='mb-1 font-semibold'>Категорії</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>
            </div>
            <x-button class='w-full'>
                Фільтрувати
            </x-button>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card class='mb-4' :job="$job">
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Детальніше
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
