<option selected disabled >@lang('web.choose_sub_cat')</option>
@foreach($subCategories as $sub)
    <option value="{{$sub->id}}">{{$sub->name()}}</option>
@endforeach
