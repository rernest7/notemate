<ul>
   @foreach($nodes as $node)
   <li>
<a href="{{ route('categories.show', $node) }}">
      {{ $node->name }}
      </a>
      @if(count($node->children))
      <x-tree :nodes="$node->children" />
      @endif
   </li>
   @endforeach
</ul>