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
    public function index(Request $request)
    {
        $categories = Category::with("descendants");
        if ($request->has('keyword') && trim($request->keyword)) {
            $categories->search($request->keyword);
        } else {
            $categories->onlyParent();
        }
        $title = trans("categories.title.index");
        return view("categories.index", [
            "categories" => $categories->paginate(5)->appends(['keyword' => $request->get('keyword')]),
            "title" => $title
        ]);
    }

    public function select(Request $request)
    {
        $categories = [];
        if ($request->has("q")) {
            $search = $request->q;
            $categories = Category::select("id", "title")
                ->where("title", "LIKE", "%$search%")
                ->limit(5)
                ->get();
        } else {
            $categories = Category::select("id", "title")
                ->onlyParent()
                ->limit(5)
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
        $title = trans("categories.title.create");
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
            // return back()->with('toast_error', $validator()->messages->all()[0])->withInput($request->all());
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

            Alert::toast(
                trans('categories.alert.create.message.success'),
                'success'
            );
            return redirect()->route('categories.index');
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
        $title = trans("categories.title.show");
        return view("categories.show", compact("category", "title"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $title = trans("categories.title.update");
        return view("categories.edit", [
            "category" => $category,
            "title" => $title
        ]);
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
        // Validasi
        $validator = Validator::make(
            $request->all(),
            [
                "title" => "required|string|max:60",
                "slug" => "required|string|unique:categories,slug," . $category->id,
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

        // Input
        try {
            $category->update([
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
            return redirect()->route('categories.index')->withSuccess(trans('categories.alert.update.message.success'));
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }

            Alert::error(
                trans('categories.alert.update.title'),
                trans('categories.alert.update.message.error', ['error' => $th->getMessage()])
            );

            // SWEET ALERT ERROR
            // return redirect()->back()->with('errors', $validator->messages()->all()[0])->withInput($request->all());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Alert::toast(
                trans('categories.alert.delete.message.success', ['title' => $category->title]),
                'success'
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('categories.alert.delete.title'),
                trans('categories.alert.delete.message.error', ['error' => $th->getMessage(), 'title' => $category->title])
            );
        }
        return redirect()->back();
    }
}
