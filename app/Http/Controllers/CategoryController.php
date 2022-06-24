<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans("categories.title");
        $categories = Category::onlyParent()
            ->with("descendants")
            ->get();
        return view("categories.index", compact("title", "categories"));
    }

    public function select(Request $request)
    {
        $categories = [];
        if ($request->has("q")) {
            $search = $request->q;
            $categories = Category::select("id", "title")
                ->where("title", "LIKE", "%$search%")
                ->limit(6)
                ->get();
        } else {
            $categories = Category::select("id", "title")
                ->onlyParent()
                ->limit(6)
                ->get();
        }

        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $title = trans("categories.create.title");
        return view("categories.create", compact("title", "categories"));
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
                "title" => "required|string|max:60",
                "slug" => "required|string|unique:categories,slug",
                "desc" => "required",
                "thumb" => "required|string|max:150",
            ]
        );

        if ($validator->fails()) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }
            // SWEET ALERT TOAST
            // return back()->with('toast_error', $validator->messages()->all()[0])->withInput($request->all());
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            Category::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'parent_id' => $request->parent_category,
                'desc' => $request->desc,
                'thumb' => parse_url($request->thumb)['path'],
            ]);

            // Alert::success(
            //     trans('categories.alert.create.title'),
            //     trans('categories.alert.create.message.success')
            // );
            return redirect()->route('categories.index')->withSuccess(trans('categories.alert.create.message.success'));
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }

            Alert::error(
                trans('categories.alert.create.title'),
                trans('categories.alert.create.message.error', ['error' => $th->getMessage()])
            );

            // SWEET ALERT ERROR
            // return redirect()->back()->with('errors', $validator->messages()->all()[0])->withInput($request->all());
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categories = Category::findOrFail('id');
        $categories->delete();

        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
