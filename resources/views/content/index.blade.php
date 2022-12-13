@extends('layouts.header')

@section('title')
  映画・ドラマ一覧
@endsection

@section('content')
  <div class="w-4/5 mb-30 mx-auto">
    <div class="flex">
      <section>
        <aside class="w-64 py-12" aria-label="Sidebar">
          <div class="pb-2">
            <form class="items-center" action="{{ route('content.index') }}" method="GET">
              <div class="relative w-full flex justify-end">
                  <input type="text" name="search_word" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 w-full text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="タイトルで検索">
                  <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                  </button>
                </div>
            </form>
          </div>
          <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <ul class="space-y-2">
              <li>
                <a href="{{ route('content.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <span class="ml-3">All</span>
                </a>
              </li>
                @foreach ($categories as $category)
                  <li>
                    <a href="{{ route('content.index', ['category_id' => $category->id]) }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3">{{ $category->name }}</span>
                    </a>
                  </li>
                @endforeach
            </ul>
          </div>
        </aside>
      </section>
      <section class="text-gray-600 w-full body-font">
        <div class="container px-5 py-12 mx-auto">
          <div class="flex flex-wrap -m-4">
            @foreach ($contents as $content)
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <a href="{{ route('content.show', ['id' => $content->id]) }}"><img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset($content->avatar) }}" alt="blog"></a>
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">@foreach ($content->categories as $category) {{ $category->name }} @endforeach</h2>
                  <a href="{{ route('content.show', ['id' => $content->id]) }}"><h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $content->title }}</h1></a>
                  <p class="leading-relaxed mb-3">{{ $content->coment }}</p>
                  <div class="flex items-center flex-wrap ">
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>{{ $content->comments_count }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
    {{ $contents->links('vendor.pagination.tailwind')}}
  </div>
@endsection