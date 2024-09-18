@props(['recipe'])
<x-card class="p-10 recipe-item">
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block" src="{{$recipe->photo ? asset('storage/' . $recipe->photo) : asset('/images/logo.jpg')}}" alt=""/>
    <div>
      <h3 class="text-2xl">
        <a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a>
      </h3>
      <div class="text-xl font-bold my-4">
        {{floor($recipe->duration/60) != 0 ? floor($recipe->duration/60) . ' hour(s)' : ''}}
        {{floor($recipe->duration%60) != 0 ? floor($recipe->duration%60) . ' min(s)' : ''}}
      </div>

      <x-recipe-tags :tagsCsv="$recipe->tags"/>
        
      <div class="text-lg mt-4">
        <i class="fa-solid fa-bowl-food"></i> {{$recipe->ingredients}}
      </div>

      <div class="text-lg mt-4">
        <p>{{$recipe->short_description}}</p>
      </div>

      @auth
      <button class="favorite-button" 
        data-recipe-id="{{$recipe->id}}" 
        data-favorited="{{auth()->user() && auth()->user()->favorites->contains($recipe->id) ? 'true' : 'false'}}"
      >
        <span class="favorite-icon">
          @if (auth()->user() && auth()->user()->favorites->contains($recipe->id))
            <i class="fas fa-heart"></i>
          @else
            <i class="far fa-heart"></i>
          @endif
        </span>
      </button>
      @else
        <a href="/register" class="favorite-button"><i class="far fa-heart"></i></a>
      @endauth

    </div>
  </div>
</x-card>
