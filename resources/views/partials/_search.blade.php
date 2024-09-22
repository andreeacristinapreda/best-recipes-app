<form action="" method="GET">
  <div class="relative border-2 border-gray-100 m-4 rounded-lg">
    <div class="absolute top-4 left-3">
      {!! request('search') != ''
        ? '<a href="' . url()->current() . '/?' . http_build_query(request()->except('search')) . '"'
          . '<i class="fa fa-close text-gray-400 z-20 hover:text-red-500 text-[28px]"></i>'
          . '</a>'
        : '<i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>'
      !!}
    </div>

    <input type="text" name="search" value="{{request('search')}}" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
      placeholder="Search Recipes..."/>

    <div class="absolute top-2 right-2">
      <button type="submit" class="h-10 w-20 text-white rounded-lg bg-green-500 hover:bg-green-600">Search</button>
    </div>
  </div>

  @if(request('tag'))
    <input type="hidden" name="tag" value="{{request('tag')}}">
  @endif
  @if(request('cathegory'))
    <input type="hidden" name="cathegory" value="{{request('cathegory')}}">
  @endif
</form>
