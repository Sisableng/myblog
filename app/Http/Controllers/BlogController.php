<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Jorenvh\Share\Share;

class BlogController extends Controller
{
    private $perpage = 10;

    public function home()
    {
        $title = 'Ciloa Media';
        return view('blog.home', [
            'title' => $title,
            'hero' => Post::publish()->latest()->take(5)->get(),
            'populars' => Post::publish()->take(3)->get(),
            'news' => Post::publish()->latest()->cursorPaginate(6),
            'categories' => Category::onlyParent()->take(5)->get(),
            'tags' => Tag::take(5)->get(),
        ]);
    }

    public function showCategories()
    {
        return view('blog.categories', [
            'categories' => Category::onlyParent()->paginate($this->perpage)
        ]);
    }

    public function showTags()
    {
        return view('blog.tags', [
            'tags' => Tag::paginate($this->perpage)
        ]);
    }

    public function searchPosts(Request $request)
    {
        if (!$request->get('keyword')) {
            return redirect()->route('blog.home');
        }

        return view('blog.search-post', [
            'posts' => Post::publish()->search($request->keyword)
                ->paginate($this->perpage)
                ->appends(['keyword' => $request->keyword])
        ]);
    }

    public function showPostsByCategory($slug)
    {
        $posts = Post::publish()->whereHas('categories', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate($this->perpage);

        $category = Category::where('slug', $slug)->first();
        $categoryRoot = $category->root();

        return view('blog.posts-category', [
            'posts' => $posts,
            'category' => $category,
            'categoryRoot' => $categoryRoot
        ]);
    }

    public function showPostsByTag($slug)
    {
        $posts = Post::publish()->whereHas('tags', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate($this->perpage);

        $tag = Tag::where('slug', $slug)->first();
        $tags = Tag::search($tag->title)->get();

        return view('blog.posts-tag', [
            'posts' => $posts,
            'tag' => $tag,
            'tags' => $tags
        ]);
    }

    public function showPostsDetail($slug)
    {
        $post = Post::publish()->with(['categories', 'tags'])->where('slug', $slug)->first();
        if (!$post) {
            return redirect()->route('blog.home');
        }

        $shareBtn = \Share::currentPage()
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->telegram();

        return view('blog.post-detail', [
            'post' => $post,
            'shareBtn' => $shareBtn
        ]);
    }

    // Pages
    public function sejarahPages()
    {
        return view('blog.pages.sejarah');
    }
}
