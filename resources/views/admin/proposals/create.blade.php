@extends('admin.layout.master')
@section('title','مقترح جديد')

@section('styles')
    <style>
        .erro{
            color: red;
        }
    </style>
@endsection

@section('content')
    <!-- Page Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{route('proposals.index')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light" >رجوع لقائمة المقترحات<span class="m-l-5"><i class="fa fa-reply"></i></span></a>
            </div>
            <h4 class="page-title">إضافة مقترح جديد</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">


                <h4 class="header-title m-t-0 m-b-30">بيانات المقترح</h4>

                <div class="row">

                    <form method="post" action="{{route('proposals.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">الإسم*</label>--}}
                                <div class="col-md-10">
                                    <input type="text" required value="{{old('ar_name')}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="ar_name" class="form-control" placeholder="إسم المقترح بالعربية">

                                    @if($errors->has('ar_name'))
                                        <p class="help-block">
                                            {{ $errors->first('ar_name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">الإسم*</label>--}}
                                <div class="col-md-10">
                                    <input type="text" required value="{{old('en_name')}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="en_name" class="form-control" placeholder="إسم المقترح بالإنجليزية">

                                    @if($errors->has('en_name'))
                                        <p class="help-block">
                                            {{ $errors->first('en_name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">رقم السجل التجاري*</label>--}}
                                <div class="col-md-10">

                                    <input name="image" type="file" class="dropify" data-max-file-size="6M"
                                           data-allowed-file-extensions="png gif jpg jpeg"
                                           data-errors-position="inside" required placeholder="صورة المقترح"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                    />

                                    @if($errors->has('image'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('image') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>





                        {{-- buttons --}}
                        <div class="col-lg-12">
                            <div class="form-group text-right m-t-20">
                                <button class="btn btn-primary waves-effect waves-light m-t-20" id="btnSubmit" type="submit">
                                    تسجيل
                                </button>
                                <button onclick="window.history.back();return false;" type="reset"
                                        class="btn btn-default waves-effect waves-light m-l-5 m-t-20">
                                    إلغاء
                                </button>
                            </div>
                        </div>

                    </form>


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
@section('scripts')
    <script>
        // Date Picker
        jQuery('#datepicker').datepicker();


        $('.dropify').dropify({
            messages: {
                'default': 'إضغط هنا او اسحب وافلت صورة السجل التجاري',
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
