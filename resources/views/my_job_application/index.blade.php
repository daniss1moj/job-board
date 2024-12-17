<x-layout :title="$title" :metaDescription="$metaDescription">
    <h1 class="text-2xl font-bold mb-4">Відгуки на вакансії</h1>
    <x-breadcrumbs class='mb-4' :links="['Мої відгуки' => '#']">
    </x-breadcrumbs>
    @forelse($applications as $application)
        <x-job-card :job="$application->job" @class([
            'bg-red-300' => $application->job->deleted_at,
        ])>
            <div class='flex items-center justify-between text-xs'>
                <div>
                    <div>
                        Відгукнулися  {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Очіуквана заробітна плата: {{ number_format($application->expected_salary) }} грн
                    </div>
                    <div>
                        Середня очіуквана заробітна плата:
                        {{ number_format($application->job->job_applications_avg_expected_salary) }} грн
                    </div>
                    <div>
                        {{ $application->job->job_applications_count }} Відгукнулося
                    </div>
                </div>
                @if (!$application->job->deleted_at)
                    <div>
                        <form action="{{ route('my-job-applications.destroy', $application->id) }}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <x-button>
                                Скасувати
                            </x-button>
                        </form>
                    </div>
                @else
                    <div class='font-medium text-black'>
                        Видалена
                    </div>
                @endif
            </div>
        </x-job-card>
    @empty
        <div class='rounded-md border border-dashed border-slate-300 p-8'>
            <p class='text-center font-medium'>
                Ви ще не відгукувалися на вакансії
            </p>
            <p class='text-center font-medium'>
                <a href="{{ route('jobs.index') }}" class='text-indigo-500 hover:underline'>Знайти вакансії</a>
            </p>
        </div>
    @endforelse
</x-layout>
