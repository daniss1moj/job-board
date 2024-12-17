<x-layout>
    <h1 class="text-2xl font-bold mb-4">Відгукнутися на вакансію</h1>
    <x-breadcrumbs :links="['Вакансії' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Відгук' => '#']" class='mb-4' />

    <x-job-card :job="$job">
    </x-job-card>
    <x-card>
        <h2 class='mb-4 text-lg font-medium'>
            Твоя заявка на вакансію
        </h2>
        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class='mb-4'>
                <x-label for="expected_salary" :required="true" class='mb-2 block text-sm font-medium'>
                    Очікувана заробітна плата
                </x-label>
                <x-text-input name="expected_salary" id="expected_salary" type="number" />
            </div>

            <div class='mb-4'>
                <x-label for="cv" :required="true" class='mb-2 block text-sm font-medium'>Завантажити
                    CV</x-label>
                <x-text-input type="file" name="cv" />
            </div>
            <x-button class='w-full'>
                Відправити
            </x-button>
        </form>
    </x-card>
</x-layout>
