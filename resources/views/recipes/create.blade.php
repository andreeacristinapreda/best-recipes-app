<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">New Recipe</h2>
      <p class="mb-4">Create your own delicious recipe</p>
    </header>

    <form method="POST" action="/recipes?{{http_build_query(request()->query())}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2"
          >Recipe Title</label
        >
        <input
          type="text"
          class="border border-gray-200 rounded p-2 w-full"
          name="title"
          placeholder="Example: Veggie Detox Salad"
          value="{{old('title')}}"
        />
        @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label
          for="short_description"
          class="inline-block text-lg mb-2"
        >
        Short Description
        </label>
        <textarea
          class="border border-gray-200 rounded p-2 w-full"
          name="short_description"
          rows="2"
          placeholder="Whom, where and when is this recipe for?"
        >{{old('short_description')}}</textarea>
        @error('short_description')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Tags (Comma Separated)
        </label>
        <input
          type="text"
          class="border border-gray-200 rounded p-2 w-full"
          name="tags"
          placeholder="Example: Fresh, Gluten-free, Light etc"
          value="{{old('tags')}}"
        />
        @error('tags')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="ingredients" class="inline-block text-lg mb-2">
          Main Ingredients (Comma Separated)
        </label>
        <input
          type="text"
          class="border border-gray-200 rounded p-2 w-full"
          name="ingredients"
          placeholder="Example: cheese, onion, olive oil, etc"
          value="{{old('ingredients')}}"
        />
        @error('ingredients')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="photo" class="inline-block text-lg mb-2">
          Recipe Photo
        </label>
        <input
          type="file"
          class="border border-gray-200 rounded p-2 w-full"
          name="photo"
          value="{{old('photo')}}"
        />
        @error('photo')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label
          for="instructions"
          class="inline-block text-lg mb-2"
        >
          Instructions
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full"
          name="instructions" rows="10" placeholder="Include all ingredients, steps, tips & tricks etc"
        >{{old('instructions')}}</textarea>
        @error('instructions')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="duration" class="inline-block text-lg mb-2">Estimated duration in minutes</label>
        <input type="number" id="duration" name="duration" class="border border-gray-200 rounded p-2 w-full"
          placeholder="Example: 40"
          value="{{old('duration')}}"
        >
        @error('duration')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button
          class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
          Create Recipe
        </button>

        <a href="/?{{http_build_query(request()->query())}}" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>