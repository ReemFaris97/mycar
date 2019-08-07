<option value="">إختار السنة</option>
@foreach($years as $year)
    <option value="{{$year->id}}">{{$year->year}}</option>
@endforeach
