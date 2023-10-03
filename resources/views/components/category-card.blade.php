            <div>

                <h3>
                    <a href="{{ route('categories.show', $category) }}">
                        {{ $category->name }}
                    </a>
                </h3>

                <p>
                    {{ $category->description }}
                </p>

                <div>
                    {{ $category->notes_count ?? 0 }} Notes in this category
                    <br />
                    {{ $category->children_count ?? 0 }} Sub-categories
                </div>

                <a href="{{ route('categories.show', $category->id) }}">View ></a>
            </div>