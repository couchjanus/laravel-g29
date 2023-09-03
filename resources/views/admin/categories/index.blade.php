@extends('layouts.app')
@section('title', $title)
@section('content')
<h1>{{ $title }}</h1>

@if (count($categories) > 0)

<table>
<tr>
<th>Name</th>
<th>Status</th>
<th>Actions</th>
</tr>
@foreach ($categories as $category)
    <tr>
<td>{{ $category->name }}</td>
<td>{{ $category->status }}</td>
<td>
    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>

    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">@csrf @method('DELETE')<input type="submit" value="Delete"></form>
</td>
</tr>

@endforeach

</table>

@else
Not categories yet
@endif
{{-- {{ dump($categories) }} --}}
@endsection
