<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        /*
        $post = new Post();
//        $post->title = 'Статья 1';
//        $post->text = 'Article text';
        $post->save();
        */


        # Post::query()->create();
        //Post::create(['title' => 'New Post', 'text' => 'Some content']);
        /*
        $post = new Post();
        $post->fill(['title' => '13:32 post, через fill', 'content' => 'Content article']);
        $post->save();
        */


        // Update
        /*
        $postForEdit = Post::find(7); // by id
        $postForEdit->text = 'New post content';
        $postForEdit->save();
        */

        /*
        Post::where('id', '>', 3)->update(['updated_at' => NOW()]);

        // Delete
         // v1
        $post = Post::find(7);
        $post->delete();
         // v2
        Post::destroy(7);
         // v3
        Post::destroy(7, 8);
         // v4
        Post::destroy([7, 8]);
        */

        /*
        $title = 'Home page';


        return view('welcome', compact('title'));
        */
        return redirect()->route('blog');
    }
}
