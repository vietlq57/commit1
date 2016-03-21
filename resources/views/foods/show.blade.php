@extends('layouts.app')

@section('title', 'Thực Phẩm')

@section('content')
@foreach($foods as $food)

       <ul>
           <li><a href="{{ url('nutrient/'. $food->id) }}">{{ $food->vi_name }}</a></li>
       </ul>
@endforeach
@endsection