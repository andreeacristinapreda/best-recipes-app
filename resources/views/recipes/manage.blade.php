<x-layout>
  <x-card class="p-10 m-4 w-full md:w-1/2 lg:w-1/3 mx-auto">
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Recipes
      </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
      <tbody>
        @unless($recipes->isEmpty())
          @foreach($recipes as $recipe)
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300">
              <img class="w-24 h-auto mr-6 md:block rounded" 
                src="{{$recipe->photo ? asset('storage/' . $recipe->photo) : asset('/images/logo.jpg')}}" alt=""
              />
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/recipes/{{$recipe->id}}?{{http_build_query(request()->query())}}">{{$recipe->title}}</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/recipes/{{$recipe->id}}/edit?{{http_build_query(request()->query())}}" class="text-blue-400 px-6 py-2 rounded-xl">
                <i class="fa-solid fa-pen-to-square"></i> Edit
              </a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <form method="POST" action="/recipes/{{$recipe->id}}?{{http_build_query(request()->query())}}" onsubmit="return confirmDelete();">
                @csrf
                @method('DELETE')
                <button class="text-red-600" type="submit">
                  <i class="fa-solid fa-trash-can"></i> Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        @else
          <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No recipes yet!</p>
          </td>
          </tr>
        @endunless
      </tbody>
    </table>
  </x-card>
</x-layout>

<script>
function confirmDelete() {
  return confirm('Are you sure you want to delete this recipe?');
}
</script>