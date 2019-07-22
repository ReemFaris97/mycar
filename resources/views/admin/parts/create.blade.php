@extends('admin.layout.master')
@section('title','القطع والمنتجات')

@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                                        <input type="text" name="part_ar_name" required
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
                                        <input type="text" name="part_en_name" required
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

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">صورة القطعة</label>
                                            <div class="col-md-10">
                                                <input name="image" type="file" class="dropify" data-max-file-size="6M"
                                                       data-allowed-file-extensions="png gif jpg jpeg"
                                                       data-errors-position="inside"
                                                       required data-parsley-required-message="الصورة الرئيسية مطلوبة"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    @if ($errors->has('image'))
                                        <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                    @endif
                                </div>



                                <div id="appendArea" class="row">

                                </div>
                                <div class="form-group col-sm-12 col-xs-12">
                                    <button id="addPartButton" type="button" class="btn btn-inverse btn-rounded w-md waves-effect waves-light m-b-5">إضافة قطعة جديدة
                                        <i class="fa fa-plus"></i>
                                    </button>
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
        // Date Picker
        jQuery('#datepicker').datepicker();


        $('.dropify').dropify({
            messages: {
                'default': 'إضغط هنا او اسحب وافلت الصورة',
                'replace': 'إسحب وافلت او إضغط للتعديل',
                'remove': 'حذف',
                'error': 'حدث خطأ ما'
            },
            error: {
                'fileSize': 'حجم الصورة كبير (6M max).',
                'fileExtension': 'نوع الصورة غير مدعوم (png - gif - jpg - jpeg)',
            }
        });


    </script>
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

        $('#addPartButton').click(function(){
            $('#appendArea').append("  <div>\n" +
                "                                        <div class=\"form-group col-sm-6 col-xs-12\">\n" +
                "                                            <label for=\"userName\">الإسم بالعربية*</label>\n" +
                "                                            <input type=\"text\" name=\"ar_name[]\" required\n" +
                "                                                   placeholder=\"الإسم بالعربية\" class=\"form-control\"\n" +
                "                                                   data-parsley-required-message=\"هذا الحقل مطلوب\"\n" +
                "                                                   {{--oninput=\"this.value = Math.abs(this.value)\"--}}\n" +
                "                                                   data-parsley-trigger=\"keyup\"\n" +
                "                                                   data-parsley-maxlength=\"50\"\n" +
                "                                                   data-parsley-maxlength-message=\"اقصى عدد حروف هو 50 حرف\" >\n" +
                "\n" +
                "                                        </div>\n" +
                "\n" +
                "                                        <div class=\"form-group col-sm-6 col-xs-12\">\n" +
                "                                            <label for=\"userName\">إسم بالإنجليزية*</label>\n" +
                "                                            <input type=\"text\" name=\"en_name[]\" required\n" +
                "                                                   placeholder=\"الإسم بالعربية\" class=\"form-control\"\n" +
                "                                                   data-parsley-required-message=\"هذا الحقل مطلوب\"\n" +
                "                                                   {{--oninput=\"this.value = Math.abs(this.value)\"--}}\n" +
                "                                                   data-parsley-trigger=\"keyup\"\n" +
                "                                                   data-parsley-maxlength=\"50\"\n" +
                "                                                   data-parsley-maxlength-message=\"اقصى عدد حروف هو 50 حرف\">\n" +
                "\n" +
                "                                        </div>\n" +
                "\n" +
                "                                        <div class=\"form-group col-sm-6 col-xs-12\">\n" +
                "                                            <label for=\"userName\">كود القطعة*</label>\n" +
                "                                            <input type=\"text\" name=\"code[]\" required\n" +
                "                                                   placeholder=\"كود القطعة\" class=\"form-control\"\n" +
                "                                                   data-parsley-required-message=\"هذا الحقل مطلوب\"\n" +
                "                                                   {{--oninput=\"this.value = Math.abs(this.value)\"--}}\n" +
                "                                                   data-parsley-trigger=\"keyup\"\n" +
                "                                                   data-parsley-maxlength=\"50\"\n" +
                "                                                   data-parsley-maxlength-message=\"اقصى عدد حروف هو 50 حرف\">\n" +
                "\n" +
                "                                        </div>\n" +
                "\n" +
                "                                        <div class=\"form-group col-sm-6 col-xs-12\">\n" +
                "                                            <label for=\"userName\">رقم القطعة*</label>\n" +
                "                                            <input type=\"number\" name=\"number[]\" required\n" +
                "                                                   placeholder=\"رقم القطعة في الصورة\" class=\"form-control\"\n" +
                "                                                   data-parsley-required-message=\"هذا الحقل مطلوب\"\n" +
                "                                                   oninput=\"this.value = Math.abs(this.value)\"\n" +
                "                                                   data-parsley-trigger=\"keyup\"\n" +
                "                                                   data-parsley-maxlength=\"50\"\n" +
                "                                                   data-parsley-maxlength-message=\"اقصى عدد حروف هو 50 حرف\">\n" +
                "                                        </div>\n" +
                "\n" +
                "                                        <div class=\"form-group col-sm-12 col-xs-12\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label class=\"col-md-2 control-label\">صورة القطعة</label>\n" +
                "                                                <div class=\"col-md-10\">\n" +
                "                                                    <input name=\"images[]\" type=\"file\" class=\"\" data-max-file-size=\"6M\"\n" +
                "                                                           data-allowed-file-extensions=\"png gif jpg jpeg\"\n" +
                "                                                           data-errors-position=\"inside\"\n" +
                "                                                           required data-parsley-required-message=\"صورة القطعة مطلوبة\"\n" +
                "                                                    />\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </div>");
        });
    </script>
@endsection

