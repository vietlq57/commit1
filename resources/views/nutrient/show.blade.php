{{ $food->vi_name }}

@foreach($nutrients as $nutrient)
    {{ $nutrient->vi_name }} : {{ $nutrient->pivot->value }}
@endforeach