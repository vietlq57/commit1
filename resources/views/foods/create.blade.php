
<form method="post" action="{{ url('/foods/added') }}">
    {{ csrf_field() }}
    <select name="groups">
        @foreach($groups as $group)
            <option value="{{ $group->id }}">{{ $group->vi_name }}</option>
        @endforeach
    </select>



    <label>Tên Thực Phẩm</label>: Tên Việt Nam<input type="text" name="vi_name"/>
    Tên Tiếng Anh: <input type="text" name="en_name"/>

    <h1>THÀNH PHẦN DINH DƯỠNG</h1>
    @foreach($nutrients as $nutrient)
        <label>{{ $nutrient->vi_name }}</label>:
        <input type="text" name="{{ $nutrient->id }}" /><br/>
    @endforeach
    <button type="submit">Tạo</button>
</form>