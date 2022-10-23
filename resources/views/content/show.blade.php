@extends('layouts.test')

@section('title')
  ブログ記事一覧のページ
@endsection

@section('content')
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  <section class="text-gray-600 body-font">
    <div class="w-4/5 px-5 py-24 mx-auto flex">
      <div class="lg:w-1/2 w-harf mb-10 lg:mb-0 rounded-lg overflow-hidden">
        <img alt="feature" class="object-cover object-center h-harf w-harf" src={{ asset($content->avatar) }}>
      </div>
      <div class="flex flex-col flex-wrap lg:py-6 -mb-10 w-1/2 lg:pl-12 lg:text-left text-center">
        <div class="flex flex-col mb-10 lg:items-start items-center">
          <div class="flex-grow border-2 border-sky-500">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ $content->title }}</h2>
            <h3 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">@foreach ($content->categories as $category) {{ $category->name }} @endforeach</h3>
            <h2 class="leading-relaxed text-base">{{ $content->user->name }}からのコメント</h2>
            <p>{{ $content->comment }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="w-4/5 mx-auto lex-grow border-2 border-sky-500">
      <h2 class="border-b-2">コメント一覧</h2>
      @foreach($content->comments as $comment)
      <div class="rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
          <p class="text-gray-700 text-base">{{ $comment->create_at }}</p>
          <p class="font-bold text-xl mb-2">{{ $comment->title }}</p>
          <p class="text-gray-700 text-base">{{ $comment->content }}</p>
        </div>
      </div>
      @endforeach
    </div>
    <div class="w-4/5 mx-auto lex-grow border-2 border-sky-500">
      <h2 class="border-b-2">コメント投稿</h2>
      <form action="{{ route('content.store.comment') }}" method="POST">
        @csrf
        <input type="hidden" id="userid" name="content_id" value={{ $content->id }}>
        <div class="mb-6">
          <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">タイトル</label>
          <input type="text" id="username-success" name="title"class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="Bonnie Green">
          <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Alright!</span> Username available!</p>
        </div>
        <div class="mb-6">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">コメント</label>
        <textarea id="message" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>
        <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">投稿</button>
      </form>
    </div>
  </div>
  </section>
@endsection
