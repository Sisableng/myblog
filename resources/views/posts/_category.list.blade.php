<label for="input_post_category" class="font-weight-bold">
    Category
</label>
<div
    class="block w-full rounded-xl border-transparent bg-slate-100 p-2.5 pl-5 text-slate-900 focus:border-green-400 focus:ring-transparent dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-green-500 dark:focus:ring-green-500 overflow-auto mt-5 h-24 overflow-y-auto shadow-inner">
    <!-- List category -->
    <ul class="pl-1 my-1" style="list-style: none;">
        @foreach ($categories as $category)
            <li class="flex items-center my-1">
                <input class="form-check" type="checkbox" name="category[]">
                <label class="form-check-label">Check me out</label>
            </li>
        @endforeach
    </ul>
    <!-- List category -->
</div>
