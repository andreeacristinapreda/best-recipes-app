<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('images/logo.jpg')}}" />
    <link rel="stylesheet" href="{{asset('css/style-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/style-rating-stars.css')}}">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: "#f5c358",
            },
          },
        },
      };
    </script>
    <title>Best Recipes</title>
  </head>
  <body class="mb-48">
   
    <nav class="flex justify-between items-center mb-4 relative m-2">

      <a href="/?{{http_build_query(request()->query())}}"><img class="w-24" src="{{asset('images/logo.jpg')}}" alt="" class="logo"/></a>

      <div class="flex m-2">
        <!-- Hamburger Button -->
        <button id="hamburger-button" type="button" class="inline-flex items-center justify-center pt-2 mr-4 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-hamburger" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
      </div>

      <!-- Dropdown Menu -->
      <div class="hidden absolute top-full right-0 w-full md:w-1/2 z-50 border border-gray-300 dark:border-gray-600 rounded" id="navbar-hamburger">
        <ul class="flex flex-col font-medium rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 text-md md:text-lg lg:text-xl p-5">
          @auth
            <li class="flex justify-end p-5">
              <button type="button" class="flex text-sm rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 self-end hover:text-laravel" id="user-menu-button">
                <p class="text-lg font-medium my-auto mx-5">{{auth()->user()->name}}</p>
                <img class="w-12 h-12 rounded-full" src="{{asset('images/logo.jpg')}}" alt="user photo">
              </button>
            </li>
          <li>
            <a href="/recipes/manage?{{http_build_query(request()->query())}}" 
              class="hover:text-laravel block py-4 px-5 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white text-right">
                <i class="fa-solid fa-gear"></i> Manage Recipes
            </a>
          </li>
          <li>
            <a class="hover:text-laravel block py-4 px-5 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white text-right">
              <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit">
                  <i class="fa-solid fa-door-closed"></i> Logout
                </button>
              </form>
            </a>
          </li>
          @else
          <li>
            <a href="/register?{{http_build_query(request()->query())}}"
              class="hover:text-laravel block py-4 px-5 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white text-right">
                <i class="fa-solid fa-user-plus"></i> Register
            </a>
          </li>
          <li>
            <a href="/login?{{http_build_query(request()->query())}}" 
              class="hover:text-laravel block py-4 px-5 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white text-right">
                <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
            </a>
          </li>
          @endauth
        </ul>
      </div>      
    </nav>

    <main>
      {{$slot}}
    </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
      <a href="/recipes/create?{{http_build_query(request()->query())}}" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5 rounded">Create Recipe</a>
    </footer>

    <x-message/>
  </body>
</html>

<script>
  document.getElementById('hamburger-button').addEventListener('click', function() {
    var menu = document.getElementById('navbar-hamburger');
    menu.classList.toggle('hidden');
  });
</script>