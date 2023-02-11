<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link href="{{ mix('css/app.css') }}" rel="stylesheet">
   <script src="{{ mix('/js/app.js') }}" defer></script>
   <title>@yield('title')</title>
</head>
<body>
  <header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a href="{{ route('content.index') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Hollywood_Sign_%28Zuschnitt%29.jpg/240px-Hollywood_Sign_%28Zuschnitt%29.jpg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">With Movie</span>
      </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        @auth
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <span class="text-gray-900">ようこそ</span>
            <span class="text-gray-900 text-lime-500">{{ Auth::User()->name }}</span>
            <span class="mr-10 text-gray-900">さん</span>
            <button class="mr-5 hover:text-gray-900">ログアウト</button>
          </form>
        @endauth
        @guest
          <a href="{{ route('guest') }}" class="mr-5 hover:text-gray-900 text-lime-500">ゲストログイン</a>
          <a href="{{ route('login') }}" class="mr-5 hover:text-gray-900">ログイン</a>
          <a href="{{ route('register') }}" class="mr-5 hover:text-gray-900">アカウント登録</a>
        @endguest
      </nav>
      <a href="{{ route('content.create.index') }}" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">作品を投稿する
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
  </header>
    <div id="app">@yield('content')</div>
</body>
</html>