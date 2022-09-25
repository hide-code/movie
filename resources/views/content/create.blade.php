@extends('layouts.test')

@section('title')
   ブログ記事一覧のページ
@endsection

@section('content')
  <div class="w-2/3 mx-auto">
    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">タイトル</label>
        <input type="text" value="" name="title" id="success" class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500" placeholder="Success input">
        <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Well done!</span> Some success messsage.</p>
      </div>
      <div>
        <label for="error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">見出し</label>
        <input type="text" value="" name="comment" id="error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500" placeholder="Error input">
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Some error message.</p>
      </div>
      <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="multiple_files">アップロード画像</label>
        <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" name="avatar" multiple="">
      </div>
      <div>
        <div class="flex">
          @foreach ($category_list as $key => $category)
          <div class="flex items-center mr-4">
              <input id="inline-checkbox" type="checkbox" name='category_ids[]' value="{{ $key }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
          </div>
          @endforeach
        </div>
      </div>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
  </div>
@endsection
