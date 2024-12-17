 <nav {{ $attributes }}>
     <ul class='flex gap-x-4 font-bold'>
         <li>
             <a href="/">
                 Головна
             </a>
         </li>

         @foreach ($links as $label => $link)
             <li>
                 >
             </li>
             <li>
                 <a href="{{ $link }}">{{ $label }}</a>
             </li>
         @endforeach

     </ul>
 </nav>
