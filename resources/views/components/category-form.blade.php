<div>
    <form action="{{ $route }}" method="POST">
<<<<<<< HEAD
@csrf
@if($method)
@method($method)
@endif

            <div>
                <label for="name">Name</label>
                <br />
                <input id="name" name="name" type="text" value="{{ $category ? $category->name : old('name') }}" />
            </div>

            <div>
                <label for="description">Description</label>
<input id="description" type="text" name="description" value="{{ $category? $category->description : old('description') }}"/>
            </div>

            <div>
<label for="category">Category</label>
<br/>
<input id="category" type="text" name="parent_id" value="{{ $category->parent_id ?: '' }}" />
            </div>

<div>
            <button>Save</button>
            </div>
    </form>
</div>
=======
        @csrf
        @if ($method)
            @method($method)
        @endif

        <div>
            <label for="name">Name</label>
            <br />
            <input id="name" name="name" type="text" value="{{ $category ? $category->name : old('name') }}" />
        </div>

        <div>
            <label for="description">Description</label>
            <input id="description" type="text" name="description"
                value="{{ $category ? $category->description : old('description') }}" />
        </div>

        <div>
            Category: {{ $parentName }}
            <br />
            <input type="hidden" name="parent_id" value="{{ $parentId}}" />
        </div>

        <div>
            <button>Save</button>
        </div>
    </form>
</div>
>>>>>>> cats
