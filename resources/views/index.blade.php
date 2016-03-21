@extends('layouts.app')

@section('title', 'Quản Lý')

@section('content')

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $("#main").click(function(){
            $("#list").slideToggle('fast');
        });
    });
</script>

<div id="main">
    <a href="#">Quản Lý Thực Phẩm</a>
</div>



<br />
<div id="list" style="display: none">
    <ul>
        <li><a href="{{ url('/showgroup') }}">Hiển Thị</a></li>
        <li><a href="{{ url('/create') }}">Thêm Thực Phẩm</a></li>

    </ul>
</div>

{{--<form role="search" action="{{ url('/foods/searchredirect') }}">
    {{ csrf_field() }}
    <input type="text" name="search" />
    <button type="submit">Search</button>
</form>--}}
@endsection