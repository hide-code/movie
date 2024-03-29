@extends('layouts.header')

@section('title')
  ブログ記事一覧のページ
@endsection

@section('content')
  <div class="w-2/3 mt-10 mx-auto">
    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="w-4/5 mb-20 mx-auto lex-grow border-sky-500">
        <h2 class="border-b-2 mb-5">コンテンツ投稿</h2>
        <div>
          <div class="mb-10">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">タイトル</label>
            <input type="text" value="" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="50文字以内で入力してください">
            @if ($errors->has('title'))
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('title')}}</p>
            @endif
          </div>
          <div class="mb-10">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">コメント</label>
            <textarea type="text" value="" name="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1000文字以内で入力してください"></textarea>
            @if ($errors->has('comment'))
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('comment') }}</p>
            @endif
          </div>
          <div class="mb-10">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500" for="multiple_files">画像</label>
            <input class="block w-2/5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" name="avatar" multiple="">
            @if ($errors->has('avatar'))
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('avatar')}}</p>
            @endif
          </div>
          <div class="mb-10">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500" for="multiple_files">カテゴリー選択（複数可）</label>
            <div class="flex">
              @foreach ($categories as $key => $category)
              <div class="flex items-center mr-4">
                  <input id="inline-checkbox" type="checkbox" name='category_ids[]' value={{ $category->id }} class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
              </div>
              @endforeach
            </div>
            @if ($errors->has('category_ids'))
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('category_ids') }}</p>
            @endif
          </div>
          <button type="submit" class="text-black bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">登録</button>
        </div>
      </div>
    </form>
  </div>
@endsection
