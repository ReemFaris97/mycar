@extends('admin.layout.master')
@section('title','تعديل الإرشاد')

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
                <a href="{{route('instructions.index')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light" >رجوع لإدارة الإرشادات<span class="m-l-5"><i class="fa fa-reply"></i></span></a>
            </div>
            <h4 class="page-title">تعديل الإرشاد</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">بيانات الإرشاد: {{$ins->name}}</h4>

                <div class="row">
                    <div class="col-xs-12">
                    <form method="post" action="{{route('instructions.update',$ins->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="userName">العنوان بالعربية*</label>
                            <input type="text" name="ar_title" required value="{{$ins->ar_title}}"
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
                            <label for="userName">العنوان بالعربية*</label>
                            <input type="text" name="en_title" required value="{{$ins->en_title}}"
                                   placeholder="الإسم بالعربية" class="form-control"
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
                                      data-parsley-maxlength-message="اقصى عدد حروف هو 255 حرف">{{$ins->ar_description}}</textarea>
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
                                      data-parsley-maxlength-message="اقصى عدد حروف هو 255 حرف">{{$ins->en_description}}</textarea>
                            @if ($errors->has('en_description'))
                                <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('en_description') }}</strong>
                                            </span>
                            @endif
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                {{--<label class="col-md-2 control-label">رقم السجل التجاري*</label>--}}
                                <div class="col-md-10">
                                    <input name="image" type="file" class="dropify" data-max-file-size="6M"
                                           data-allowed-file-extensions="png gif jpg jpeg"
                                           data-errors-position="inside"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-show-remove="false"
                                           data-default-file="{{getimg($ins->image)}}"
                                    />

                                    @if ($errors->has('image'))
                                        <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        {{-- buttons --}}
                        <div class="col-lg-12">
                            <div class="form-group text-right m-t-20">
                                <button class="btn btn-primary waves-effect waves-light m-t-20" id="btnSubmit" type="submit">
                                    تعديل
                                </button>
                                <button onclick="window.history.back();return false;" type="reset"
                                        class="btn btn-default waves-effect waves-light m-l-5 m-t-20">
                                    إلغاء
                                </button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
@section('scripts')
    <script>

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
