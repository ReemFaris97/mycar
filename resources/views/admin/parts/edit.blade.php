@extends('admin.layout.master')
@section('title','تعديل المنتج '.$part->ar_name)

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
            <form id="partForm" data-parsley-validate novalidate method="POST" action="{{route('parts.update',$part->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('parts.index')}}" type="button" class="btn btn-custom  waves-effect waves-light"> رجوع <span class="m-l-5"><i
                                        class="fa fa-reply"></i></span>
                            </a>
                        </div>
                        <!-- Page-Title -->
                        <h4 class="page-title">تعديل منتج  {{$part->ar_name}}</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">بيانات قطعة الغيار</h4>
                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">القسم الرئيسي</label>

                                        <select class="col-xs-6 form-control" required
                                                name="category_id" id="category"
                                                data-parsley-trigger="select"
                                                data-parsley-required-message="هذا الحقل إجباري">
                                            <option value="" selected disabled>إختار القسم الرئيسي</option>
                                            @foreach ($categories  as $cat)
                                                <option value="{{$cat->id}}" @if($part->subCategory->category->id == $cat->id) selected @endif >{{$cat->ar_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">القسم الفرعي</label>

                                        <select class="col-xs-6 form-control" required
                                                name="sub_category_id" id="subCategory"
                                                data-parsley-trigger="select"
                                                data-parsley-required-message="هذا الحقل إجباري">
                                            <option value="" selected disabled>إختار القسم الفرعي</option>
                                            @foreach($subCategories as $sub)
                                                <option value="{{$sub->id}}" @if($part->sub_category_id == $sub->id) selected @endif>{{$sub->ar_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sub_category_id'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                                <strong>{{ $errors->first('sub_category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">إسم القطعة بالعربية*</label>
                                        <input type="text" name="part_ar_name" required value="{{$part->ar_name}}"
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
                                        <input type="text" name="part_en_name" required value="{{$part->en_name}}"
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
                                                <option value="{{$company->id}}" @if($part->company_model->company->id == $company->id) selected @endif >{{$company->ar_name}}</option>
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
                                            @foreach($models as $model)
                                                <option value="{{$model->id}}" @if($part->company_model_id == $model->id) selected @endif >{{$model->ar_name}}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('company_model_id'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('company_model_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <input name="image" type="file" class="dropify" data-max-file-size="6M"
                                                       data-allowed-file-extensions="png gif jpg jpeg"
                                                       data-errors-position="inside"
                                                       data-parsley-required-message="هذا الحقل مطلوب"
                                                       data-show-remove="false"
                                                       data-default-file="{{getimg($part->image)}}"
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
                                @if($part->code != null)
                                <div id="CodePanel">
                                    <div class="form-group col-lg-12 col-xs-12">
                                        <label class="col-md-3 control-label">الكود</label>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <input id="codeInput" value="{{$part->code}}" type="text" name="code" class="form-control" placeholder="كود القطغة" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

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

            $('#partForm').submit(function () {

                if(($('input[type=checkbox]').prop('checked')) && $('#appendArea').children().length == 0 ) {
                    alert('يجب إضافة قطع تابعة للقطعة الأولى');
                    return false;
                }else{
                    this.submit();
                }
            });

            $('.removeAppended').click(function () {
                $(this).parents(".the-appended-item").remove();
            });



            $('#category').change(function () {
                var id = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.get.subcategories') }}',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#subCategory').html(data.data);
                    }
                });
            });

            //            **************************************
        });

        $('#mainCheck').change(function () {
            if(this.checked){

                $('#CodePanel').hide();
                $('#codeInput').removeAttr('required data-parsley-required-message');
                $('#addPartButton').show();
            }
            else{
                $('#CodePanel').show();
                $('#codeInput').attr({
                    'required':'required',
                    'data-parsley-required-message':'هذا الحقل مطلوب',
                });

                $('#addPartButton').hide();
                if ( $('#appendArea').children().length > 0 ) {
                    $('#appendArea').empty();
                }
            }
        });



        $('#company').change(function () {
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get.companymodels') }}',
                data: {id: id},
                dataType: 'json',
                success: function (data) {
                    $('#company_model').html(data.data);
                }
            });
        });

        //***************************************************************
        $('#teamSelect').change(function () {
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get.subcategories') }}',
                data: {id: id},
                dataType: 'json',
                success: function (data) {
                    $('#user_id').html(data.data);
                }
            });
        });



        //*****************************************************************

        $('#addPartButton').click(function(){
            $('#appendArea').append(' <div class="the-appended-item">\n' +
                '        <div class="form-group col-sm-6 col-xs-12">\n' +
                '            <label for="userName">الإسم بالعربية*</label>\n' +
                '            <input type="text" name="ar_name[]" required="" placeholder="الإسم بالعربية" class="form-control" data-parsley-required-message="هذا الحقل مطلوب" data-parsley-trigger="keyup" data-parsley-maxlength="50" data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">\n' +
                '\n' +
                '        </div>\n' +
                '\n' +
                '        <div class="form-group col-sm-6 col-xs-12">\n' +
                '            <label for="userName">إسم بالإنجليزية*</label>\n' +
                '            <input type="text" name="en_name[]" required="" placeholder="الإسم بالعربية" class="form-control" data-parsley-required-message="هذا الحقل مطلوب" data-parsley-trigger="keyup" data-parsley-maxlength="50" data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">\n' +
                '\n' +
                '        </div>\n' +
                '\n' +
                '        <div class="form-group col-sm-6 col-xs-12">\n' +
                '            <label for="userName">كود القطعة*</label>\n' +
                '            <input type="text" name="codes[]" required="" placeholder="كود القطعة" class="form-control" data-parsley-required-message="هذا الحقل مطلوب" data-parsley-trigger="keyup" data-parsley-maxlength="50" data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">\n' +
                '\n' +
                '        </div>\n' +
                '\n' +
                '        <div class="form-group col-sm-6 col-xs-12">\n' +
                '            <label for="userName">رقم القطعة*</label>\n' +
                '            <input type="number" name="numbers[]" required="" placeholder="رقم القطعة في الصورة" class="form-control" data-parsley-required-message="هذا الحقل مطلوب" oninput="this.value = Math.abs(this.value)" data-parsley-trigger="keyup" data-parsley-maxlength="50" data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">\n' +
                '        </div>\n' +
                '\n' +
                '        <div class="form-group col-sm-6 col-xs-12">\n' +
                '            <div class="form-group">\n' +
                '                <label class="col-md-2 control-label">صورة القطعة</label>\n' +
                '                <div class="col-md-10">\n' +
                '                    <input name="images[]" type="file" class="" data-max-file-size="6M" data-allowed-file-extensions="png gif jpg jpeg" data-errors-position="inside" required="" data-parsley-required-message="صورة القطعة مطلوبة">\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </div>\n' +
                '\n' +
                '        <div class="form-group col-sm-6 col-xs-12">\n' +
                '            <div class="form-group">\n' +
                '                <div class="col-md-10">\n' +
                '                    <button type="button" class="btn btn-danger form-control removeAppended" >حذف</button>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </div>\n' +
                '    </div>');

            $('.removeAppended').click(function () {
                $(this).parents(".the-appended-item").remove();
            });


        });
    </script>
@endsection

