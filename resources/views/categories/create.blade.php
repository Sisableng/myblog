@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
<div class="container">
    
<form>
<div class="mb-10 p-10 sm:px-5 border border-slate-200 rounded-3xl">
      <div class="mb-10 flex sm:flex-col items-center">
    <label for="" class="text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.title') }}</label>
    <input type="text" value="" class="form-control">
</div>
  <div class="mb-10 flex sm:flex-col items-center">
    <label for="" class="text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.slug') }}</label>
    <input type="text" value="" class="form-control">
</div>
  <div class="mb-10 flex sm:flex-col items-center">
    <label for="" class="text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.desc') }}</label>
    <input type="text" value="" class="form-control">
</div>
<div class="flex sm:flex-col justify-center items-center w-full">
    <label for="" class="text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.thumb') }}</label>
    <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-3xl border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col justify-center items-center pt-5 pb-6">
            <svg class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input value="" id="dropzone-file" type="file" class="hidden">
    </label>
</div>
</div> 
  <div class="w-full flex justify-end">
    <button type="submit" class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-7 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700">{{ trans('categories.form.submit') }}</button>
  </div>
</form>

</div>
@endsection