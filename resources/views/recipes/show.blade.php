<x-layout>

@include('partials._search')

<a href="/?{{http_build_query(request()->query())}}" class="inline-block text-black ml-4 mb-4">
  <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-10">
  <x-card class="p-10 m-4 w-full md:w-1/2 lg:w-1/3 mx-auto">
    @auth
      @if(auth()->user()->id == $recipe->user_id)
        <div class="flex justify-end">
          <a href="/recipes/{{$recipe->id}}/edit?{{http_build_query(request()->query())}}" class="cursor-pointer edit-icon edit-icon-singlepg">
            <i class="fas fa-pencil-alt"></i>
          </a>

          <form method="POST" action="/recipes/{{$recipe->id}}?{{http_build_query(request()->query())}}" onsubmit="return confirmDelete();">
            @csrf
            @method('DELETE')
            <button type="submit">
            <i class="fa-solid fa-trash-can delete-icon-singlepg"></i>
            </button>
          </form>
      </div>
      @endif
    @endauth
    <div class="flex flex-col items-center justify-center text-center">
      <img class="w-48 mb-2 rounded" src="{{$recipe->photo ? asset('storage/' . $recipe->photo) : asset('/images/logo.jpg')}}" alt=""/>
      <h3 class="text-2xl mb-2">{{$recipe->title}}</h3>

      @auth
      <button class="favorite-button favorite-button-singlepg" 
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
        <a href="/register?{{http_build_query(request()->query())}}" class="favorite-button favorite-button-singlepg"><i class="far fa-heart"></i></a>
      @endauth

      {{-- star rating --}}
      @auth
      <form id="rating-form" action="{{ route('recipes.rate', ['recipe' => $recipe->id]) }}" method="POST">
        @csrf
        <div class="star-rating">
          <input type="hidden" name="rating" id="rating-value" value="{{round($averageRating)}}">
            <i class="fas fa-star" data-value="1"></i>
            <i class="fas fa-star" data-value="2"></i>
            <i class="fas fa-star" data-value="3"></i>
            <i class="fas fa-star" data-value="4"></i>
            <i class="fas fa-star" data-value="5"></i>
        </div>
      </form>
      @endauth

      <div class="text-xl font-bold mb-4">
        {{floor($recipe->duration/60) != 0 ? floor($recipe->duration/60) . ' hour(s)' : ''}}
        {{floor($recipe->duration%60) != 0 ? floor($recipe->duration%60) . ' min(s)' : ''}}
      </div>

      <x-recipe-tags :tagsCsv="$recipe->tags"/>

      <div class="text-lg mt-4">
        <i class="fa-solid fa-bowl-food"></i> {{$recipe->ingredients}}
      </div>
      <div class="border border-gray-200 w-full mb-6"></div>
    </div>
    <div class="flex flex-col">
      <div>
        <h3 class="text-3xl font-bold mb-4">Short description</h3>
        <div class="text-lg space-y-6 mb-4">{{$recipe->short_description}}</div>
      </div>
      <div>
        <h3 class="text-3xl font-bold mb-4">Instructions</h3>
        <div class="text-lg space-y-6 mb-4">{{$recipe->instructions}}</div>
      </div>
    </div>
  </x-card>
</div>

</x-layout>

@auth
<script>

// favorite icon
document.addEventListener('DOMContentLoaded', function() {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  document.querySelectorAll('.favorite-button').forEach(function(button) {
    button.addEventListener('click', function (e) {
       e.preventDefault();

       var recipeId = this.getAttribute('data-recipe-id');
       var button = this;

       fetch('/recipes/' + recipeId + '/toggle-favorite', {
         method: 'POST',
         headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
         },
         body: JSON.stringify({})
       })
       .then(response => response.json())
       .then(data => {
         if (data.message === 'Recipe added to favorites') {
            button.querySelector('.favorite-icon').innerHTML = '<i class="fas fa-heart"></i>'; //filled heart
         } else if (data.message === 'Recipe removed from favorites') {
            button.querySelector('.favorite-icon').innerHTML = '<i class="far fa-heart"></i>'; //empty
         }
       })
       .catch(error => {
         console.error('Error toggling favorite:', error);
       });
    });
 });
});

// delete confirmation
function confirmDelete() {
  return confirm('Are you sure you want to delete this recipe?');
}

// star rating
document.addEventListener('DOMContentLoaded', function() {
  const stars = document.querySelectorAll('.star-rating i');
  const form = document.getElementById('rating-form');
  const ratingValue = document.getElementById('rating-value');
  const initialRating = ratingValue.value;

  function highlightStars(rating) {
    stars.forEach(star => {
      if (star.dataset.value <= rating) {
        star.classList.add('filled');
      } else {
        star.classList.remove('filled');
      }
    });
  }

  // initial rating display
  highlightStars(initialRating);

  stars.forEach(star => {
    star.addEventListener('mouseover', function() {
      highlightStars(this.dataset.value);
    });

    star.addEventListener('click', function() {
      ratingValue.value = this.dataset.value;
      form.submit();
    });
  });

  document.querySelector('.star-rating').addEventListener('mouseleave', function() {
      highlightStars(ratingValue.value);
  });
});
</script>
@endauth