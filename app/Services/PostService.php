<?php

namespace App\Services;

use App\Events\PostCrated;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostCreated;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Notification;

class PostService {

    public function post_store($request): void
    {
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photo', $name);
        }

        $post = Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null
        ]);


        $post->tags()->attach($request->tags);

        PostCrated::dispatch($post); // event tarqatish
        //  ProcessBigFileUpload::dispatch($post);
        //  Mail::to($request->user())->later( now()->addSeconds(3 ),(new PostEmailCreated ($post))->onQueue('sedding-meiler'));


        Notification::send(auth()->user(), new PostCreated($post));
    }

    /**
     * @param $post
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show($post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $resents = Post::latest()->get()->except($post->id)->take(5);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.show', compact('post', 'resents', 'categories', 'tags'));
    }


}
