<section class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
<div
  class="absolute top-0 left-0 w-full h-full opacity-60 bg-no-repeat bg-center"
  style="background-image: url('images/hero.jpg')"
>
</div>

<div class="z-10">
  <h1 class="text-6xl font-bold uppercase text-white">Best<span class="text-black">Recipes</span></h1>
  <p class="text-2xl text-gray-200 font-bold my-4">Find or post delicious recipes</p>
  <div>
    @auth
    @else
    <a href="/register?{{http_build_query(request()->query())}}" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
      Sign Up to Post your own Recipe
    </a>
    @endauth
  </div>
</div>
</section>