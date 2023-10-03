<div>
    <{{ $headingTag }}>
    {{ $note->title }}
    </{{ $headingTag }}>
<div>
{{ $note->excerpt }}
</div>
<a href="{{ route('notes.show', $note->id) }}">View ></a>
</div>