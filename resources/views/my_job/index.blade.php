<x-layout>
    <h1 class="text-2xl font-bold mb-4">Мої вакансії</h1>
    <x-breadcrumbs :links="[
        'Мої вакансії' => route('my-jobs.index'),
    ]" class='mb-4' />
    <div class='mb-8 text-right'>
        <x-link-button href="{{ route('my-jobs.create') }}">
            Додати вакансію
        </x-link-button>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :job="$job" @class(['mb-4', 'bg-red-300' => $job->deleted_at])>
            <div class='text-xs'>
                @forelse($job->jobApplications as $jobApplication)
                    <div class='mb-4 flex items-center justify-between'>
                        <div>
                            <div>
                                {{ $jobApplication->user->name }}
                            </div>
                            <div>
                                {{ $jobApplication->created_at->diffForHumans() }}
                            </div>
                            <div>
                                <a href="{{ route('downloadFile', ['file_name' => explode('/', $jobApplication->cv_path)[1], 'folder' => explode('/', $jobApplication->cv_path)[0]]) }}"
                                    class='font-semibold text-blue-500 hover:underline'>
                                    Скачати CV
                                </a>
                            </div>
                        </div>
                        <div>
                            ${{ number_format($jobApplication->expected_salary ?? 0) }}
                        </div>
                    </div>
                @empty
                    <p>Немає резюме</p>
                @endforelse
                @if (!$job->deleted_at)
                    <div class='flex space-x-2'>
                        <x-link-button href="{{ route('my-jobs.edit', $job) }}">Редагувати</x-link-button>
                        <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button>
                                Видалити
                            </x-button>
                        </form>
                    </div>
                @else
                    <div class='font-medium'>
                        Видалено
                    </div>
                @endif
            </div>
        </x-job-card>
    @empty
        <div class='rounded-md border border-dashed border-slate-300 p-8'>
            <p class='text-center font-medium'>Ще немає вакансій</p>
        </div>
    @endforelse
</x-layout>
