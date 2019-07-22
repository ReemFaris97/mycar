@extends('admin.layout.master')
@section('title','تعديل قسم فرعي')
@section('content')

    <div class="row">
        <div class="col-sm-12">

            <form data-parsley-validate novalidate method="POST" action="{{route('subcategories.update',$subCat->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('subcategories.index')}}" type="button" class="btn btn-custom  waves-effect waves-light"> رجوع <span class="m-l-5"><i
                                        class="fa fa-reply"></i></span>
                            </a>
                        </div>
                        <!-- Page-Title -->
                        <h4 class="page-title">{{$subCat->ar_name}}تعديل قسم فرعي</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">بيانات القسم</h4>
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label> القسم الرئيسي*</label>
                                        <select class="col-xs-12 form-control" required
                                                name="category_id"
                                                data-parsley-trigger="select"
                                                data-parsley-required-message="هذا الحقل إجباري">
                                            <option value="" selected disabled>إختار القسم</option>
                                            @foreach ($categories  as $cat)
                                                <option value="{{$cat->id}}" @if($cat->id == $subCat->category_id) selected @endif>{{$cat->ar_name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('category_id'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">الإسم بالعربية*</label>
                                        <input type="text" name="ar_name" required value="{{$subCat->ar_name}}"
                                               placeholder="الإسم بالعربية" class="form-control"
                                               data-parsley-required-message="هذا الحقل مطلوب"
                                               {{--oninput="this.value = Math.abs(this.value)"--}}
                                               data-parsley-trigger="keyup"
                                               data-parsley-maxlength="50"
                                               data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">
                                        @if ($errors->has('ar_name'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('ar_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">الإسم بالإنجليزية*</label>
                                        <input type="text" name="en_name" required value="{{$subCat->en_name}}"
                                               placeholder="الإسم بالإنجليزية" class="form-control"
                                               data-parsley-required-message="هذا الحقل مطلوب"
                                               {{--oninput="this.value = Math.abs(this.value)"--}}
                                               data-parsley-trigger="keyup"
                                               data-parsley-maxlength="50"
                                               data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">
                                        @if ($errors->has('en_name'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('en_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>



                                </div>
                                <div class="col-xs-12">

                                    <div class="form-group text-right m-b-0 ">
                                        <button class="btn btn-primary waves-effect waves-light m-t-20" type="submit"> حفظ
                                            البيانات
                                        </button>
                                        <button onclick="window.history.back();return false;"
                                                class="btn btn-default waves-effect waves-light m-l-5 m-t-20"> إلغاء
                                        </button>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div><!-- end col -->

        </div>
        <!-- end row -->
        </form>
    </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection


