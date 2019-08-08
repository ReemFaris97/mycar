<option value="">إختار موديل السيارة</option>
@foreach($Models as $model)
    <option value="{{$model->id}}">{{$model->name()}}</option>
@endforeach
