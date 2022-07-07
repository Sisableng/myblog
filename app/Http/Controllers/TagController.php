<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    private $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $request->get('keyword')
            ? Tag::search($request->keyword)->paginate($this->perPage)
            : Tag::paginate($this->perPage);
        $title = __('tags.title.index');
        return view("tags.index", [
            "tags" => $tags->appends(['keyword' => $request->keyword]),
            "title" => $title
        ]);
    }

    public function select(Request $request)
    {
        $tags = [];
        if ($request->has('q')) {
            $tags = Tag::select('id', 'title')->search($request->q)->get();
        } else {
            $tags = Tag::select('id', 'title')->limit(5)->get();
        }

        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('tags.title.create');
        return view('tags.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                "title" => "required|string|max:25",
                "slug" => "required|string|unique:tags,slug",
            ]
        )->validate();

        try {
            Tag::create([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);
            Alert::toast(
                trans('tags.alert.create.message.success'),
                'success'
            );

            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('tags.alert.create.title'),
                trans('tags.alert.create.message.error', ['error' => $th->getMessage()])
            );

            // SWEET ALERT ERROR
            // return redirect()->back()->with('errors', $validator->messages()->all()[0])->withInput($request->all());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $title = __('tags.title.update');
        return view('tags.edit', compact('title', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        Validator::make(
            $request->all(),
            [
                "title" => "required|string|max:25",
                "slug" => "required|string|unique:tags,slug," . $tag->id
            ]
        )->validate();

        try {
            $tag->update([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);
            Alert::toast(
                trans('tags.alert.update.message.success'),
                'success'
            );

            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('tags.alert.update.title'),
                trans('tags.alert.update.message.error', ['error' => $th->getMessage()])
            );

            // SWEET ALERT ERROR
            // return redirect()->back()->with('errors', $validator->messages()->all()[0])->withInput($request->all());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            Alert::toast(
                trans('tags.alert.delete.message.success', ['title' => $tag->title]),
                'success'
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('tags.alert.delete.title'),
                trans('tags.alert.delete.message.error', ['error' => $th->getMessage(), 'title' => $tag->title])
            );
        }
        return redirect()->back();
    }
}
