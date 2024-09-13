@extends('layout')

@section('content')
@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4">
  <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
  <div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <div class="flex flex-col items-center justify-center text-center">
      <img class="w-48 mr-6 mb-6" src="{{asset('images/burger.jpg')}}" alt=""/>
      <h3 class="text-2xl mb-2">{{$recipe->title}}</h3>
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
      <div class="border border-gray-200 w-full mb-6"></div>
      <div>
        <h3 class="text-3xl font-bold mb-4">Instructions</h3>
        <div class="text-lg space-y-6">{{$recipe->instructions}}</div>
      </div>
    </div>
  </div>
</div>

@endsection