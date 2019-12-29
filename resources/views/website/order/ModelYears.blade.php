<option value="">@lang('web.choose_year')</option>
@foreach($years as $year)
    <option value="{{$year->id}}">{{$year->year}}</option>
@endforeach
