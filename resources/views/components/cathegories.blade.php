<nav class="bg-white">
  <div class="max-w-screen-xl px-2 py-3 mx-2">
    <div class="flex items-start justify-start">
      <ul class="flex flex-row font-large mt-0 space-x-4 rtl:space-x-reverse text-lg">
        <li>
          <a href="{{url()->current()}}/?{{http_build_query(request()->except('cathegory'))}}"
            class="{{ request('cathegory') ? 'bg-white text-gray-400' : 'bg-laravel text-black font-bold' }} relative px-4 py-2 border border-gray-300 hover:border-yellow-400 hover:text-black rounded-t-lg transition-all duration-200 ease-in-out" aria-current="page">
            All
          </a>
        </li>
        <li>
          <a
            @auth
              href="{{url()->current()}}/?{{http_build_query(array_merge(request()->except('cathegory', 'page'), ['cathegory' => 'favorites']))}}"
            @else
              href="/register"
            @endauth
            class="{{ request('cathegory') == 'favorites' ? 'bg-laravel text-black font-bold' : 'bg-white text-gray-400' }} relative px-4 py-2 border border-gray-300 hover:border-yellow-400 hover:text-black rounded-t-lg transition-all duration-200 ease-in-out">
            Favorite
          </a>
        </li>
        <li>
          <a
            @auth
              href="{{url()->current()}}/?{{http_build_query(array_merge(request()->except('cathegory', 'page'), ['cathegory' => 'my-recipes']))}}"
            @else
              href="/register"
            @endauth
            class="{{ request('cathegory') == 'my-recipes' ? 'bg-laravel text-black font-bold' : 'bg-white text-gray-400' }} relative px-4 py-2 border border-gray-300 hover:border-yellow-400 hover:text-black rounded-t-lg transition-all duration-200 ease-in-out">
            My Recipes
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
