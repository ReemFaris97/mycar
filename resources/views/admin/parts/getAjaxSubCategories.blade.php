<option value="" selected disabled>إختار القسم الفرعي</option>
@foreach ($subCategories  as $subCat)
    <option value="{{$subCat->id}}">{{$subCat->ar_name}}</option>
@endforeach
