<x-layout>

@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4">
  <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
  <x-card>
    <div class="flex flex-col items-center justify-center text-center">
      <img class="w-48 mr-6 mb-6" src="{{$recipe->photo ? asset('storage/' . $recipe->photo) : asset('/images/burger.jpg')}}" alt=""/>
      <h3 class="text-2xl mb-2">{{$recipe->title}}</h3>
      <div class="text-xl font-bold mb-4">
        {{floor($recipe->duration/60) != 0 ? floor($recipe->duration/60) . ' hour(s)' : ''}}
        {{floor($recipe->duration%60) != 0 ? floor($recipe->duration%60) . ' min(s)' : ''}}
      </div>

      <x-recipe-tags :tagsCsv="$recipe->tags"/>

      <div class="text-lg mt-4">
        <i class="fa-solid fa-bowl-food"></i> {{$recipe->ingredients}}
      </div>
      <div class="border border-gray-200 w-full mb-6"></div>
      <div>
        <h3 class="text-3xl font-bold mb-4">Instructions</h3>
        <div class="text-lg space-y-6">{{$recipe->instructions}}</div>
      </div>
    </div>
  </x-card>
</div>

</x-layout>