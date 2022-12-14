
<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("category_content", function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('content_id')->unsigned();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete('cascade');;
            $table->foreign("content_id")->references("id")->on("contents")->onDelete('cascade');;
            $table->primary(['category_id','content_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("category_content");
    }
}
