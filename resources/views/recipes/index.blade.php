<x-layout>

@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
  @if(count($recipes) == 0)
    <p>No recipes here</p>
  @endif

  @foreach($recipes as $recipe)
    <x-recipe-card :recipe="$recipe"/>
  @endforeach
</div>

<div class="mt-6 p-4">
  {{$recipes->links()}}
</div>

</x-layout>