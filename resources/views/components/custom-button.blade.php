@props(['type'])

@if($type=='login')
<button
  class="my-4 me-4 px-4 py-2 bg-blue-600 text-white rounded-md font-medium transition-colors duration-200 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
>
@elseif($type=="register")
<button
  class="my-4 me-4 px-4 py-2 border border-blue-600 text-blue-600 rounded-md font-medium transition-colors duration-200 hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
>
@endif
 {{ $slot }}
</button>