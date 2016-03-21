@extends('layouts.app')

@section('title', 'Tạo')

@section('content')
{{ count($groups) }}

@foreach($groups as $group)
    <ul>
        <li><a href="{{ url('/foods/' . $group->id) }}">{{ $group->vi_name }}</a></li>
    </ul>
@endforeach
@endsection