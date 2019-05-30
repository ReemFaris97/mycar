@extends('admin.layout.master')
@section('title','إنشاء إرشادات جديدة')
@section('content')

    <div class="row">
        <div class="col-sm-12">

            <form data-parsley-validate novalidate method="POST" action="{{route('instructions.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('instructions.index')}}" type="button" class="btn btn-custom  waves-effect waves-light"> رجوع <span class="m-l-5"><i
                                        class="fa fa-reply"></i></span>
                            </a>
                        </div>
                        <!-- Page-Title -->
                        <h4 class="page-title">إنشاء إرشادات</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">بيانات الإرشادات</h4>
                            <div class="row">
                                <div class="col-xs-12">


                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">العنوان بالعربية*</label>
                                        <input type="text" name="ar_title" required
                                               placeholder="الإسم بالعربية" class="form-control"
                                               data-parsley-required-message="هذا الحقل مطلوب"
                                               {{--oninput="this.value = Math.abs(this.value)"--}}
                                               data-parsley-trigger="keyup"
                                               data-parsley-maxlength="50"
                                               data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">
                                        @if ($errors->has('ar_title'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('ar_title') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName"> العنوان بالإنجليزية*</label>
                                        <input type="text" name="en_title" required
                                               placeholder="الإسم بالإنجليزية" class="form-control"
                                               data-parsley-required-message="هذا الحقل مطلوب"
                                               {{--oninput="this.value = Math.abs(this.value)"--}}
                                               data-parsley-trigger="keyup"
                                               data-parsley-maxlength="50"
                                               data-parsley-maxlength-message="اقصى عدد حروف هو 50 حرف">
                                        @if ($errors->has('en_title'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('en_title') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group  col-xs-12">
                                        <label for="userName"> الوصف بالعربية*</label>
                                        <textarea name="ar_description" required
                                                  placeholder="الوصف بالعربية" class="form-control"
                                                  data-parsley-required-message="هذا الحقل مطلوب"
                                                  {{--oninput="this.value = Math.abs(this.value)"--}}
                                                  data-parsley-trigger="keyup"
                                                  data-parsley-maxlength="255"
                                                  data-parsley-maxlength-message="اقصى عدد حروف هو 255 حرف"></textarea>
                                        @if ($errors->has('ar_description'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('ar_description') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group  col-xs-12">
                                        <label for="userName"> الوصف بالإنجليزية*</label>
                                        <textarea name="en_description" required
                                                  placeholder="الوصف بالإنجليزية" class="form-control"
                                                  data-parsley-required-message="هذا الحقل مطلوب"
                                                  {{--oninput="this.value = Math.abs(this.value)"--}}
                                                  data-parsley-trigger="keyup"
                                                  data-parsley-maxlength="255"
                                                  data-parsley-maxlength-message="اقصى عدد حروف هو 255 حرف"></textarea>
                                        @if ($errors->has('en_description'))
                                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('en_description') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{--<label class="col-md-2 control-label">رقم السجل التجاري*</label>--}}

                                                <input name="image" type="file" class="dropify" data-max-file-size="6M"
                                                       data-allowed-file-extensions="png gif jpg jpeg"
                                                       data-errors-position="inside" required placeholder="صورة السجل التجاري"
                                                       data-parsley-required-message="هذا الحقل مطلوب"
                                                />

                                                @if($errors->has('licence_number'))
                                                    <p class="help-block" style="color: #FF0000;">
                                                        {{ $errors->first('licence_number') }}
                                                    </p>
                                                @endif

                                        </div>
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

    <!-- end row -->

@endsection

@section('scripts')
    <script>
        // Date Picker
        jQuery('#datepicker').datepicker();


        $('.dropify').dropify({
            messages: {
                'default': 'إضغط هنا او اسحب وافلت الصورة هنا',
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

@endsection
