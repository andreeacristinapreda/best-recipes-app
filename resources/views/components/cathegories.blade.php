<nav class="bg-gray-50 dark:bg-gray-700 mb-6">
  <div class="max-w-screen-xl px-4 py-3 mx-2">
    <div class="flex items-start justify-start">
      <ul class="flex flex-row font-large mt-0 space-x-4 rtl:space-x-reverse text-lg">
        <li>
          <a href="{{url()->current()}}/?{{http_build_query(request()->except('cathegory'))}}"
            class="text-gray-900 dark:text-white border border-gray-300 hover:border-blue-500 hover:text-blue-500 px-4 py-2 rounded-lg transition-colors duration-200 ease-in-out {{ request('cathegory') ? '' : 'bg-blue-500 text-white' }}" aria-current="page">
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
            class="text-gray-900 dark:text-white border border-gray-300 hover:border-blue-500 hover:text-blue-500 px-4 py-2 rounded-lg transition-colors duration-200 ease-in-out {{ request('cathegory') == 'favorites' ? 'bg-blue-500 text-white' : '' }}">
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
            class="text-gray-900 dark:text-white border border-gray-300 hover:border-blue-500 hover:text-blue-500 px-4 py-2 rounded-lg transition-colors duration-200 ease-in-out {{ request('cathegory') == 'my-recipes' ? 'bg-blue-500 text-white' : '' }}">
            My Recipes
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>