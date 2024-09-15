@props(['recipe'])
<x-card class="p-10">
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block" src="{{$recipe->photo ? asset('storage/' . $recipe->photo) : asset('/images/burger.jpg')}}" alt=""/>
    <div>
      <h3 class="text-2xl">
        <a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">
        {{floor($recipe->duration/60) != 0 ? floor($recipe->duration/60) . ' hour(s)' : ''}}
        {{floor($recipe->duration%60) != 0 ? floor($recipe->duration%60) . ' min(s)' : ''}}
      </div>

      <x-recipe-tags :tagsCsv="$recipe->tags"/>
        
      <div class="text-lg mt-4">
        <i class="fa-solid fa-bowl-food"></i> {{$recipe->ingredients}}
      </div>
    </div>
  </div>
</x-card>