<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('posts.index.title');
        $posts = Post::all();
        return view('posts.index', [
            "title" => $title,
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('posts.create.title');
        return view('posts.create', [
            'title' => $title,
            'categories' => Category::with('descendants')->onlyParent()->get(),
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:posts,slug',
                'thumb' => 'required',
                'desc' => 'required|max:250',
                'content' => 'required',
                'category' => 'required',
                'tag' => 'required',
                'status' => 'required'
            ],
        );

        if ($validator->fails()) {
            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $post = Post::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumb' => parse_url($request->thumb)['path'],
                'desc' => $request->desc,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);

            $post->tags()->attach($request->tag);
            $post->categories()->attach($request->category);

            Alert::toast(
                __('posts.alert.create.message.success'),
                'success'
            );
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast(
                __('posts.alert.create.message.error', ['error' => $th->getMessage()]),
                'errors'
            );
            if ($validator->fails()) {
                if ($request['tag']) {
                    $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
                }
                return redirect()->back()->withInput($request->all());
            }
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $title = __('posts.detail.title');
        $categories = $post->categories;
        $tags = $post->tags;
        return view('posts.detail', [
            'title' => $title,
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    private function statuses()
    {
        return [
            'draft' => __('posts.create.form.status.draft'),
            'publish' => __('posts.create.form.status.publish')
        ];
    }
}
