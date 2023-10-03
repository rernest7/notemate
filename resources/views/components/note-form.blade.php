<div>
    <form action="{{ $route }}" method="POST">
@csrf
@if($method)
@method($method)
@endif

            <div>
                <label for="title">Title</label>
                <br />
                <input id="title" name="title" type="text" value="{{ $note ? $note->title : old('title') }}" />
            </div>

            <div>
                <label for="body">Body</label>
                <textarea id="body" name="body" style="width: 100%; ">
{{ $note ? $note->body : old('body') }}
</textarea>
            </div>

            <div>
<label for="category">Category</label>
<<<<<<< HEAD
<br/>
<input id="category" type="text" name="category_id" value="{{ $note->category_id ?: '' }}" />
=======

<br/>

<select id="category" name="category_id">
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ $prefills['category'] == $cat->id ? 'selected' : '' }}>
{{ $cat->name }}
        </option>
        @endforeach
</select>
>>>>>>> cats
            </div>

<div>
            <button>Save</button>
            </div>
    </form>
</div>