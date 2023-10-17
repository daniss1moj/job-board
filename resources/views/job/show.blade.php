<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => '#']" class='mb-4'>
    </x-breadcrumbs>
    <x-job-card :job="$job">
        <p class='mb-4 text-sm text-slate-500'>
            {!! nl2br(e($job->description)) !!}
        </p>
        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">
                Apply
            </x-link-button>
        @else
            <div class='text-center text-sm font-medium text-slate-500'>
                You already applied for this job!
            </div>
        @endcan
    </x-job-card>
    <x-card>
        <h2 class='mb-4 text-lg font-medium'>
            More {{ $job->employer->company_name }} Jobs
        </h2>

        <div class='text-sm text-slate-500'>
            @foreach ($job->employer->jobs as $otherJob)
                <div class='mb-4 flex justify-between'>
                    <div>
                        <div class='text-lg text-slate-700 hover:text-teal-700'>
                            <a href="{{ route('jobs.show', $otherJob) }}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class='text-xs text-slate-900'>
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
