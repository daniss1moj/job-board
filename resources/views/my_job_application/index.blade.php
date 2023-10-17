<x-layout>
    <x-breadcrumbs class='mb-4' :links="['My Job Applications' => '#']">
    </x-breadcrumbs>
    @forelse($applications as $application)
        <x-job-card :job="$application->job" @class([
            'bg-red-300' => $application->job->deleted_at,
        ])>
            <div class='flex items-center justify-between text-xs text-slate-500'>
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Expected Salary: ${{ number_format($application->expected_salary) }}
                    </div>
                    <div>
                        Average Expected Salary:
                        ${{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </div>
                    <div>
                        {{ $application->job->job_applications_count }} Applied
                    </div>
                </div>
                @if (!$application->job->deleted_at)
                    <div>
                        <form action="{{ route('my-job-applications.destroy', $application->id) }}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <x-button>
                                Cancel
                            </x-button>
                        </form>
                    </div>
                @else
                    <div class='font-medium text-black'>
                        Deleted
                    </div>
                @endif
            </div>
        </x-job-card>
    @empty
        <div class='rounded-md border border-dashed border-slate-300 p-8'>
            <p class='text-center font-medium'>
                No job applications yet
            </p>
            <p class='text-center font-medium'>
                <a href="{{ route('jobs.index') }}" class='text-indigo-500 hover:underline'>Find some jobs</a>
            </p>
        </div>
    @endforelse
</x-layout>
