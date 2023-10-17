<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" class='mb-4' />

    <x-job-card :job="$job">
    </x-job-card>
    <x-card>
        <h2 class='mb-4 text-lg font-medium'>
            Your Job Application
        </h2>
        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class='mb-4'>
                <x-label for="expected_salary" :required="true" class='mb-2 block text-sm font-medium text-slate-900'>
                    Expected salary
                </x-label>
                <x-text-input name="expected_salary" id="expected_salary" type="number" />
            </div>

            <div class='mb-4'>
                <x-label for="cv" :required="true" class='mb-2 block text-sm font-medium text-slate-900'>Upload
                    CV</x-label>
                <x-text-input type="file" name="cv" />
            </div>
            <x-button class='w-full'>
                Apply
            </x-button>
        </form>
    </x-card>
</x-layout>
