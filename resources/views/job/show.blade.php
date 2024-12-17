

<x-layout :title="$title" :metaDescription="$metaDescription">
    <h1 class="text-2xl font-bold mb-4">Ваканcія: {{$job->title}}, {{$job->employer->company_name}}</h1>
    <x-breadcrumbs :links="['Вакансії' => route('jobs.index'), $job->title => '#']" class='mb-4'>
    </x-breadcrumbs>
    <x-job-card :job="$job">
        <p class='mb-4 text-sm '>
            {!! nl2br(e($job->description)) !!}
        </p>
        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">
                Відгукнутися
            </x-link-button>
        @else
            <div class='text-center text-sm font-medium'>
                Ви вже відгукнулися на вакансію!
            </div>
        @endcan
    </x-job-card>
    <x-card>
        <h2 class='mb-4 text-lg font-medium'>
            Більше вакансій від {{ $job->employer->company_name }}
        </h2>

        <div class='text-sm'>
            @foreach ($job->employer->jobs as $otherJob)
                <div class='mb-4 flex justify-between'>
                    <div>
                        <div class='text-lg'>
                            <a href="{{ route('jobs.show', $otherJob) }}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class='text-xs'>
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class='text-xs'>
                        ${{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
