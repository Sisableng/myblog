<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public function index(Request $request)
    {
        $typeSelected = in_array($request->type, ['image', 'file']) ? $request->type : "image";
        $title = __('File Manager');
        return view('filemanager.index', [
            'title' => $title,
            'types' => $this->types(),
            'typeSelected' => $typeSelected
        ]);
    }

    public function types()
    {
        return [
            'image' => __('Images'),
            'file' => __('Files')
        ];
    }
}
