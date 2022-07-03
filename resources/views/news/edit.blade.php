<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('News') }}
      </h2>
    </x-slot>
  
    <div class="container mx-auto">
      <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
        <div>
          <form method="POST" action="{{ route('news.update', $news) }}">
            @csrf
            {{ method_field('PATCH') }} 
            <div class="mb-6">
              <label for="name" class="block mb-2 text-sm text-gray-600">{{ __('Title') }}</label>
              <input type="text" name="title" placeholder="Title" value = {{ old('title', $news->title) }} autofocus required
                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                @if ($errors->has('title'))
                <span class="font-medium text-red-600 dark:text-red-300 px-1 py-1">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
              </div>
            <div class="mb-6">
              <label for="message" class="block mb-2 text-sm text-gray-600">{{ __('Contents') }}</label>
              <textarea rows="5" name="content" placeholder="Content"
                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                required > {{ old('content', $news->content) }}</textarea>
              @if ($errors->has('content'))
              <span class="font-medium text-red-600 dark:text-red-300 px-1 py-1">
                <strong>{{ $errors->first('content') }}</strong>
              </span>
              @endif
            </div>
            <div class="mb-6">
              <button type="submit"
                class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                {{ __('Save') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
  </x-app-layout>