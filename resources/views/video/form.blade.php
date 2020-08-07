
   
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($video->name) ? $video->name : '' }}" required >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'Details' }}</label>
    <input class="form-control" name="details" type="text" id="details" value="{{isset($video->details) ? $video->details :'' }}" >
    {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('tag') ? 'has-error' : ''}}">
    <label for="tag" class="control-label">{{ 'Tag' }}</label>
    <input class="form-control" name="tag" type="text" id="tag" value="@isset($video->tag) {{$video->tag}} @elseisset {{''}} @endisset
" >
    {!! $errors->first('tag', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image"  required>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <input class="form-control" name="video" type="file" id="video"  required>
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('subcategory_id') ? 'has-error' : ''}}">
    <label for="subcategory_id" class="control-label">{{ 'Subcategory' }}</label>
    <select name="subcategory_id" class="form-control" id="subcategory_id" required >
        <option selected disabled >Please Select</option>
        @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('subcategory_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category' }}</label>
    <select name="category_id" class="form-control" id="category_id" required >
        <option selected disabled >Please Select</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
