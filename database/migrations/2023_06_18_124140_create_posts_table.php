<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};


/*

Post::create(['slug' => 'my-work-post', 'category_id' => 2,'title' => 'My Work Post', 'excerpt' => 'Lorem Ipsum Dolor Sit Amet', 'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum luctus nunc sed nulla porttitor vulputate. Vivamus tincidunt risus et nulla ultricies iaculis. Curabitur ut arcu in diam pharetra accumsan. Maecenas malesuada laoreet diam nec lobortis. Nulla vehicula nisi finibus est venenatis, et imperdiet quam suscipit. Morbi congue velit sem. Maecenas non justo ac tortor consectetur consequat a nec nisi. Interdum et malesuada fames ac anteipsum primis in faucibus. Integer egestas efficitur quam, ac sodales est malesuada eu.</p>'])
Post::create(['slug' => 'my-personal-post', 'category_id' => 1,'title' => 'My Personal Post', 'excerpt' => 'Lorem Ipsum Dolor Sit Amet', 'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum luctus nunc sed nulla porttitor vulputate. Vivamus tincidunt risus et nulla ultricies iaculis. Curabitur ut arcu in diam pharetra accumsan. Maecenas malesuada laoreet diam nec lobortis. Nulla vehicula nisi finibus est venenatis, et imperdiet quam suscipit. Morbi congue velit sem. Maecenas non justo ac tortor consectetur consequat a nec nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer egestas efficitur quam, ac sodales est malesuada eu.</p>'])
Post::create(['slug' => 'my-hobby-post', 'category_id' => 3,'title' => 'My Hobby Post', 'excerpt' => 'Lorem Ipsum Dolor Sit Amet', 'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum luctus nunc sed nulla porttitor vulputate. Vivamus tincidunt risus et nullaultricies iaculis. Curabitur ut arcu in diam pharetra accumsan. Maecenas malesuada laoreet diam nec lobortis. Nulla vehicula nisi finibus est venenatis, et imperdiet quam suscipit. Morbi congue velit sem. Maecenas non justo ac tortor consectetur consequat a nec nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer egestas efficitur quam, ac sodales est malesuada eu.</p>']); 

*/