{{ $food->vi_name }}

@foreach($nutrients as $nutrient)
    {{ $nutrient->vi_name }} : {{ $nutrient->pivot->value }}

@endforeach
    <a href="{{ url('/edit/'. $food->id) }}">Sửa</a>
    <a href="{{ url('/delete/'. $food->id) }}">Xóa</a>
