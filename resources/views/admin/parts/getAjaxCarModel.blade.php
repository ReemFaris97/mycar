<option value="" selected disabled>إختار الموديل</option>
@foreach ($Models  as $model)
    <option value="{{$model->id}}">{{$model->ar_name}}</option>
@endforeach
