<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12 container content-center mx-auto pb-1 ">
        <div class="flex justify-end pb-2" >
            <a  href="{{ route('news.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Add News
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Title') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Content') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Owner') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __(' Created Date') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">
                            {{ __(' Actions') }}
                            </span>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $newsModel)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $newsModel->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $newsModel->content }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $newsModel->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $newsModel->title }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{__('Edit') }}</a>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline px-1 py-1">{{ __('Delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $news->links() }}
            </table>
        </div>
    </div>
</x-app-layout>
