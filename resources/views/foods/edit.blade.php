@extends('layouts.app')

@section('title', 'Tạo')

@section('content')

<form method="post" action="{{ url('/update/'. $food->id) }}">
    {{ csrf_field() }}
    <select name="groups">

        @foreach($groups as $group)
            @if($group->id == $food->group->id)
                 <option value="{{ $group->id }}" selected="selected">{{ $group->vi_name }}</option>
            @else
                <option value="{{ $group->id }}">{{ $group->vi_name }}</option>
            @endif
        @endforeach
    </select>



    <label>Tên Thực Phẩm</label>: Tên Việt Nam<input type="text" name="vi_name" value="{{ $food->vi_name }}"/>
    Tên Tiếng Anh: <input type="text" name="en_name" value="{{ $food->en_name }}"/>

    <h1>THÀNH PHẦN DINH DƯỠNG</h1>

        @foreach($nutrients as $nutrient)
                @if($nutrient->id == $arr[0]->pivot->nutrient_id)
                    <label>{{ $nutrient->vi_name }}</label>:
                    <input type="text" name="{{ $nutrient->id }}" value="{{ $arr[0]->pivot->value }}" /><br/>
                    @break

                @else()
                    <label>{{ $nutrient->vi_name }}</label>:
                    <input type="text" name="{{ $nutrient->id }}" /><br/>
                @endif
        @endforeach

        @for($i=1; $i<=count($arr)-1;$i++)
            @foreach($nutrients as $nutrient)

                @if($nutrient->id > $arr[$i-1]->pivot->nutrient_id && $nutrient->id <= $arr[$i]->pivot->nutrient_id)
                    @if($nutrient->id == $arr[$i]->pivot->nutrient_id)
                        <label>{{ $nutrient->vi_name }}</label>:
                        <input type="text" name="{{ $nutrient->id }}" value="{{ $arr[$i]->pivot->value }}" /><br/>
                    @else()
                        <label>{{ $nutrient->vi_name }}</label>:
                        <input type="text" name="{{ $nutrient->id }}" /><br/>
                    @endif
                @endif
            @endforeach
        @endfor

        @foreach($nutrients as $nutrient)
            @if($nutrient->id > $arr[count($arr)-1]->pivot->nutrient_id)
                <label>{{ $nutrient->vi_name }}</label>:
                <input type="text" name="{{ $nutrient->id }}" /><br/>
            @endif
        @endforeach


    {{--@endfor--}}
    <button type="submit">Sửa</button>
</form>
@endsection
@for($i = 1; $i<4; $i++)
    {{ $arr[$i-1]->pivot->nutrient_id }}
@endfor
{{ count($arr) }}