@extends('layout')
//view for all recipes
@section('content')

@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
  @if(count($recipes) == 0)
    <p>No recipes here</p>
  @endif

  @foreach($recipes as $recipe)
    <div class="bg-gray-50 border border-gray-200 rounded p-6">
      <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="images/burger.jpg" alt=""/>
        <div>
          <h3 class="text-2xl">
            <a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a>
          </h3>
          <div class="text-xl font-bold mb-4">
            {{floor($recipe->duration/60) != 0 ? floor($recipe->duration/60) . ' hour(s)' : ''}}
            {{floor($recipe->duration%60) != 0 ? floor($recipe->duration%60) . ' min(s)' : ''}}
          </div>
          <ul class="flex">
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
              <a href="#">delicious</a>
            </li>
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
              <a href="#">easy</a>
            </li>
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
              <a href="#">fast</a>
            </li>
          </ul>
          <div class="text-lg mt-4">
            <i class="fa-solid fa-bowl-food"></i> {{$recipe->ingredients}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection