@extends('admin.layout.master')
@section('title','القطع والمنتجات')

@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            <form data-parsley-validate novalidate method="POST" action="{{route('parts.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('parts.index')}}" type="button" class="btn btn-custom  waves-effect waves-light"> رجوع <span class="m-l-5"><i
                                        class="fa fa-reply"></i></span>
                            </a>
                        </div>
                        <!-- Page-Title -->
                        <h4 class="page-title">إنشاء منتج</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">بيانات قطعة الغيار</h4>
                            <div class="row">
                                <div class="col-xs-12">



                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">إسم القطعة بالعربية*</label>
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
                                        <label for="userName">إسم القطعة بالإنجليزية*</label>
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

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName"> الشركة المصنعة</label>

                                        <select class="col-xs-6 form-control" required
                                                name="company_id" id="company"
                                                data-parsley-trigger="select"
                                                data-parsley-required-message="هذا الحقل إجباري">
                                            <option value="" selected disabled>إختار الشركة المصنعة</option>
                                            @foreach ($companies  as $company)
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
                                        <label for="userName"> الموديل</label>

                                        <select class="col-xs-6 form-control" required
                                                name="company_model_id" id="company_model"
                                                data-parsley-trigger="select"
                                                data-parsley-required-message="هذا الحقل إجباري">
                                            <option value="" selected disabled>إختار الموديل</option>


                                        </select>
                                        @if ($errors->has('company_model_id'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('company_model_id') }}</strong>
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
            </form>
        </div>

        <!-- end row -->

    </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#company').change(function () {
                var id = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('getAjaxCompanyModels') }}',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#company_model').empty();
                        $.each(data.data, function (element, ele) {
                            $('#company_model').append("<option value='"+ele.id+"'>" + ele.ar_name + "</option>");
                        });
                    }
                });
            });

            //            **************************************
        });
    </script>
@endsection

