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
                <textarea id="body" name="body">
{{ $note ? $note->body : old('body') }}
</textarea>
            </div>

<div>
            <button>Save</button>
            </div>
    </form>
</div>