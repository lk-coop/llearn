<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;


class BlogController extends Controller
{
    public function index(Request $request) {
        /*
         * Cookie
         */
//        Cookie::queue('test', 'some value', 1);
//        dump(Cookie::get('test'));

//        Cookie::queue(Cookie::forget('test'));



//        dump($request->session()->all());
        /*
        dump(session()->all());
        $request->session()->put('test', 'Test value');
        session([
            'test2' => 'Test value for test2',
            'cart' => [
                ['id' => 1, 'name' => 'Product 1'],
                ['id' => 2, 'name' => 'Product 2'],
            ]
        ]);

        dump(session('test'));
        dump($request->session()->get('cart')[0]['name']);

        // Дополнение
        $request->session()->push('cart', ['id' => 3, 'name' => 'Product 3']);
        session()->push('cart', ['id' => 4, 'name' => 'Product 4']);

        // pull - получение и удаление
        session()->pull('card');

        // Удаление
        $request->session()->forget('test');

        // Полная очистка сессии
        # $request->session()->flush();
        */


        /*
         * Cache
         * Если не передаётся время кеширование - данные будут закешированы бессрочно, либо используя Cache::forever('key', 'value')
         */
        #Cache::put('key', 'value', 60); // ttl {seconds}
//        dump(Cache::get('key'));

//        if (Cache::has('posts')) {
//            $posts = Cache::get('posts');
//        } else {
//            $posts = Post::orderBy('id', 'desc')->get();
//            Cache::put('posts', $posts);
//        }
//        Cache::forget('posts'); // remove cache
//        #Cache::flush(); // Удаление всех данных из кеша
        $posts = Post::orderBy('id', 'desc')->paginate(2); // paginate params: 1 - count_posts

        return view('blog', compact('posts'));
    }

    public function create() {
        $title = 'Создание поста для блога';
        $rubrics = Rubric::pluck('title', 'id')->all();

        return view('create', compact('title', 'rubrics'));
    }

    public function store(Request $request) {
        /*
        dump($request->input('title'));
        dump($request->input('text'));
        dd($request->input('rubric_id'));
        */
//        dd($request->all());


        $rules = [
            'title' => 'required|min:5|max:100',
            'text' => 'required',
            'rubric_id' => 'integer'
        ];
        $messages = [
            'title.required' => 'Заполните поле \'Post title\'',
            'title.min' => 'Минимум 5 символов для поля \'Post title\'',
            'rubric_id.integer' => 'Выберите рубрику из списка'
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

//        $this->validate($request, $rules);
        Post::create($request->all());
        $request->session()->flash('success', 'Данные сохранены');

        return redirect()->route('blog');
    }
}
