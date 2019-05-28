@extends('admin.layout.master')
@section('title','إنشاء موديل جديد')
@section('content')

    <div class="row">
        <div class="col-sm-12">

            <form data-parsley-validate novalidate method="POST" action="{{route('models.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('models.index')}}" type="button" class="btn btn-custom  waves-effect waves-light"> رجوع <span class="m-l-5"><i
                                            class="fa fa-reply"></i></span>
                            </a>
                        </div>
                        <!-- Page-Title -->
                        <h4 class="page-title">إنشاء موديل</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">بيانات الموديل</h4>
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="company_id">الشركة المصنعة*</label>
                                        <select name="company_id" required class="form-control"
                                                data-parsley-required-message="هذا الحقل مطلوب">
                                            <option selected disabled value="">اختار الشركة</option>
                                            @foreach ($companies as $company)
                                                <option value="{{$company->id}}">{{$company->ar_name}}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('company_id'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('company_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="company_id">سنوات تصنيع الموديل*</label>
                                        <select name="year[]" required
                                                data-parsley-required-message="إختار سنة واحدة على الأقل" class="select2 select2-multiple form-control" multiple="multiple" multiple data-placeholder="Choose ...">
                                            <option selected disabled value="">اختار سنوات التصنيع</option>
                                            @for($i = $currentYear; $i>=1990 ; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor

                                        </select>


                                        @if ($errors->has('company_id'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('company_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">إسم الموديل بالعربية*</label>
                                        <input type="text" name="ar_name" required
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
                                        <label for="userName">إسم الموديل بالإنجليزية*</label>
                                        <input type="text" name="en_name" required
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

@section('scripts')
    <script>
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });

    </script>
@endsection


