<select id="category_id" name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
    <option value="">{{ __('messages.selectCateg') }}</option>
    @foreach($categories as $category)
        <option @selected(old('category_id')==$category->id)  value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>