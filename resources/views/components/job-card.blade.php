 <x-card {{ $attributes->class('mb-4') }}>
     <div class='flex justify-between'>
         <h2 class='text-lg font-medium'>{{ $job->title }}</h2>
         <div class="font-semibold">{{ number_format($job->salary, 2)  }} грн.</div>
     </div>

     <div class='mb-4 flex items-center justify-between text-sm'>
         <div class='flex space-x-4'>
             <div>
                 {{ $job->employer->company_name }}
             </div>
             <div>{{ $job->location }}</div>
         </div>
         <div class='flex space-x-1 text-xs'>

             <x-tag>
                 <a href="{{ route('jobs.index', ['experience' => $job->experience, ...request()->query()]) }}">
                     {{ Str::ucfirst($job->experience) }}
                 </a>
             </x-tag>
             <x-tag>
                 <a href="{{ route('jobs.index', ['category' => $job->category, ...request()->query()]) }}">
                     {{ $job->category }}
                 </a>
             </x-tag>
         </div>
     </div>

     {{ $slot }}

 </x-card>
