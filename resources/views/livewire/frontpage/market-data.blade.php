<div wire:init="loadMarketData" class="grid grid-cols-2 md:flex md:flex-row space-y-2"> <!-- markets -->
@if(!empty($data))
  <!-- Sverige -->
  <div class="flex flex-col items-center flex-1">
    <span>
      <svg class="inline h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#ffda44"/><path fill="#0052b4" d="M200.3 222.6h309.5A256 256 0 0 0 256 0a256.9 256.9 0 0 0-55.7 6v216.6zm-66.7 0V31.1A256.2 256.2 0 0 0 2.2 222.6h131.4zm0 66.8H2.2a256.2 256.2 0 0 0 131.4 191.5V289.4zm66.7 0v216.5A256.9 256.9 0 0 0 256 512a256 256 0 0 0 253.8-222.6H200.3z"/></svg>
    </span>
    <span class="flex items-center">
      <svg class="@if($data['data']['sverige']['open']) text-green-500 @else text-red-500 @endif" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 7.5H7a.5.5 0 00.146.354L7.5 7.5zm0 6.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM7 3v4.5h1V3H7zm.146 4.854l3 3 .708-.708-3-3-.708.708z" fill="currentColor"></path></svg>
      &nbsp;OMXSPI
    </span>
    <span>{{ $data['data']['sverige']['OMXSPI'] }}%</span>
  </div>

  <!-- USA -->
  <div class="flex flex-col items-center flex-1">
    <span class="relative inline-block">
      <svg class="inline h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#eee"/><path fill="#d80027" d="M244.9 256H512c0-23.1-3-45.5-8.8-66.8H244.9V256zm0-133.6h229.5a257.4 257.4 0 0 0-59-66.7H244.9v66.7zM256 512c60.2 0 115.6-20.8 159.4-55.7H96.6A254.9 254.9 0 0 0 256 512zM37.6 389.6h436.8a254.5 254.5 0 0 0 28.8-66.8H8.8a254.5 254.5 0 0 0 28.8 66.8z"/><path fill="#0052b4" d="M118.6 40h23.3l-21.7 15.7 8.3 25.6-21.7-15.8-21.7 15.8 7.2-22a257.4 257.4 0 0 0-49.7 55.3h7.5l-13.8 10a255.6 255.6 0 0 0-6.2 11l6.6 20.2-12.3-9a253.6 253.6 0 0 0-8.4 20l7.3 22.3H50L28.4 205l8.3 25.5L15 214.6l-13 9.5A258.5 258.5 0 0 0 0 256h256V0c-50.6 0-97.7 14.7-137.4 40zm9.9 190.4l-21.7-15.8-21.7 15.8 8.3-25.5L71.7 189h26.8l8.3-25.5 8.3 25.5h26.8l-21.7 16 8.3 25.5zm-8.3-100l8.3 25.4-21.7-15.7-21.7 15.7 8.3-25.5-21.7-15.7h26.8l8.3-25.6 8.3 25.6h26.8l-21.7 15.7zm100.1 100l-21.7-15.8-21.7 15.8 8.3-25.5-21.7-15.8h26.8l8.3-25.5 8.3 25.5h26.8L212 205l8.3 25.5zm-8.3-100l8.3 25.4-21.7-15.7-21.7 15.7 8.3-25.5-21.7-15.7h26.8l8.3-25.6 8.3 25.6h26.8L212 130.3zm0-74.7l8.3 25.6-21.7-15.8L177 81.3l8.3-25.6L163.5 40h26.8l8.3-25.5L207 40h26.8L212 55.7z"/></svg>
    </span>
    <span class="flex items-center">
      <svg class="@if($data['data']['usa']['open']) text-green-500 @else text-red-500 @endif" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 7.5H7a.5.5 0 00.146.354L7.5 7.5zm0 6.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM7 3v4.5h1V3H7zm.146 4.854l3 3 .708-.708-3-3-.708.708z" fill="currentColor"></path></svg>
      &nbsp;Dow Jones
    </span>
    <span>{{ $data['data']['usa']['Dow Jones'] }}%</span>
  </div>

  <!-- Japan -->
  <div class="flex flex-col items-center flex-1">
    <span>
      <svg class="inline h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#eee"/><circle cx="256" cy="256" r="111.3" fill="#d80027"/></svg>
    </span>
    <span class="flex items-center">
      <svg class="@if($data['data']['japan']['open']) text-green-500 @else text-red-500 @endif" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 7.5H7a.5.5 0 00.146.354L7.5 7.5zm0 6.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM7 3v4.5h1V3H7zm.146 4.854l3 3 .708-.708-3-3-.708.708z" fill="currentColor"></path></svg>
      &nbsp;Nikkei
    </span>
    <span>{{ $data['data']['japan']['Nikkei'] }}%</span>
  </div>

  <!-- China -->
  <div class="flex flex-col items-center flex-1">
    <span>
      <svg class="inline h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#d80027"/><path fill="#ffda44" d="M140.1 155.8l22.1 68h71.5l-57.8 42.1 22.1 68-57.9-42-57.9 42 22.2-68-57.9-42.1H118zm163.4 240.7l-16.9-20.8-25 9.7 14.5-22.5-16.9-20.9 25.9 6.9 14.6-22.5 1.4 26.8 26 6.9-25.1 9.6zm33.6-61l8-25.6-21.9-15.5 26.8-.4 7.9-25.6 8.7 25.4 26.8-.3-21.5 16 8.6 25.4-21.9-15.5zm45.3-147.6L370.6 212l19.2 18.7-26.5-3.8-11.8 24-4.6-26.4-26.6-3.8 23.8-12.5-4.6-26.5 19.2 18.7zm-78.2-73l-2 26.7 24.9 10.1-26.1 6.4-1.9 26.8-14.1-22.8-26.1 6.4 17.3-20.5-14.2-22.7 24.9 10.1z"/></svg>
    </span>
    <span class="flex items-center">
      <svg class="@if($data['data']['kina']['open']) text-green-500 @else text-red-500 @endif" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 7.5H7a.5.5 0 00.146.354L7.5 7.5zm0 6.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM7 3v4.5h1V3H7zm.146 4.854l3 3 .708-.708-3-3-.708.708z" fill="currentColor"></path></svg>
      &nbsp;Hang Seng
    </span>
    <span>{{ $data['data']['kina']['Hang Seng'] }}%</span>
  </div>
@else
<div class="flex flex-col items-center flex-1">
  <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
  </svg>
</div>
@endif
</div> <!-- /markets -->
