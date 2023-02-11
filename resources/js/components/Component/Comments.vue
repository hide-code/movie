<template>
  <div>
    <div class="w-4/5 mb-20 mx-auto lex-grow border-sky-500">
      <h2 class="border-b-2 mb-5">コメント投稿</h2>
      <div>
        <div class="mb-6">
          <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">コメントタイトル</label>
          <input v-model="title" type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <p v-if="valid.title" class="mt-2 text-sm text-red-600 dark:text-red-500">50文字以内で入力してください。</p>
        </div>
        <div class="mb-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">コメント</label>
          <textarea v-model="content" id="message" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
          <p v-if="valid.content" class="mt-2 text-sm text-red-600 dark:text-red-500">200文字以内で入力してください。</p>
        </div>
        <button type="submit" @click="post" class="text-black bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">投稿</button>
      </div>
    </div>
    <div class="w-4/5 mb-10 mx-auto lex-grow border-sky-500">
      <h2 class="border-b-2">コメント一覧</h2>
      <div v-for="(comment, index) in viewComments" :key="index" class="rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
          <p class="text-gray-700 text-base">{{ comment.create_at }}</p>
          <p class="font-bold text-xl mb-2">{{ comment.title }}</p>
          <p class="text-gray-700 text-base">{{ comment.content }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        title: "",
        content: "",
        viewComments: this.comments,
        valid:{
          title: false,
          content: false
        },
      };
    },
    props:{
      comments:Array,
      contentId:Number,
    },
    computed: {
    },
    methods: {
      isInValidTitle() {
        return this.title.length === 0 || this.title.length > 50
      },
      isInValidContent() {
        return this.content.length === 0 || this.content.length > 200
      },
      post: function () {
        this.valid.title = this.isInValidTitle()
        this.valid.content = this.isInValidContent()
        axios
          .post("api/content/comment/store", {
            content_id: this.contentId,
            title: this.title,
            content: this.content,
          })
          .then((res) => {
            this.viewComments.unshift(res.data.comment)
          })
          .catch((err) => {
          });
      },
    },
  };
</script>
