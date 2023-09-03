@extends('layouts.app')
@section('title', $title)
@section('content')
<h1>{{ $title }}</h1>

<form action="{{ route('categories.store') }}" method="POST">
@csrf
    <div>
        <label>Category name:
        <input name="name">
        </label>
    </div>
    <div>
        <label>Category DESCRIPTION:
        <textarea name="description"></textarea>
        </label>
    </div>
        <div>
        <label>Category status:
        <input name="status" type="checkbox">
        </label>
    </div>

    <div><input type="submit" value="Add new"></div>
</form>
@endsection
