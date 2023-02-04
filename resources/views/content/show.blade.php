@extends('layouts.header')

@section('title')
  ブログ記事一覧のページ
@endsection

@section('content')
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  <section class="text-gray-600 body-font">
    <div class="w-4/5 px-5 py-12 mx-auto flex">
      <div class="lg:w-1/4 w-1/4 mb-10 lg:mb-0 rounded-lg overflow-hidden">
        <img alt="feature" class="object-cover object-center h-harf w-harf" src={{ asset($content->avatar) }}>
      </div>
      <div class="flex flex-col flex-wrap lg:py-6 -mb-10 w-1/2 lg:pl-12 lg:text-left text-center">
        <div class="flex flex-col mb-10 lg:items-start items-center">
          <div class="flex-grow mb-20 border-sky-500">
            <h2 class="text-gray-900 text-2xl title-font font-medium mb-5">{{ $content->title }}</h2>
            <h2 class="tracking-widest text-base title-font font-medium text-gray-400 mb-3">@foreach ($content->categories as $category) {{ $category->name }} @endforeach</h2>
            <h2 class="leading-relaxed mb-5 text-lg">{{ $content->user->name }} さんからのコメント</h2>
            <p>{{ $content->comment }}</p>
          </div>
          <div>
          @if ($content->user_id === Auth::id())
            <a href="{{ route('content.edit', $content->id) }}" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">編集</a>
          @endif
          </div>
        </div>
      </div>
    </div>
    <comments :comments='@json($content->comments)' :content-id='@json($content->id)'></comments>
  </div>
  </section>
@endsection
