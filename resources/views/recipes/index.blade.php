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

@auth
  <script>
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
  </script>
@endauth