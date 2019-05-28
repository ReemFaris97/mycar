@extends('admin.layout.master')
@section('title','تعديل المدينة')
@section('content')

    <div class="row">
        <div class="col-sm-12">

            <form data-parsley-validate novalidate method="POST" action="{{route('cities.update',$city->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('cities.index')}}" type="button" class="btn btn-custom  waves-effect waves-light"> رجوع <span class="m-l-5"><i
                                            class="fa fa-reply"></i></span>
                            </a>
                        </div>
                        <!-- Page-Title -->
                        <h4 class="page-title">تعديل المدينة</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">بيانات المدينة</h4>
                            <div class="row">
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="userName">إسم المدينة بالعربية*</label>
                                    <input type="text" name="ar_name" required value="{{$city->ar_name}}"
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
                                    <label for="userName">إسم المدينة بالإنجليزية*</label>
                                    <input type="text" name="en_name" required value="{{$city->en_name}}"
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
                                    <label for="userName">سعر التوصيل *</label>
                                    <input type="number" name="delivery_price" required value="{{$city->delivery_price}}"
                                           placeholder="سعر التوصيل" class="form-control"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           oninput="this.value = Math.abs(this.value)"
                                           data-parsley-trigger="keyup"
                                        {{--data-parsley-maxlength="25"--}}
                                        {{--data-parsley-maxlength-message="اقصى عدد حروف هو 25 حرف"--}}
                                    >
                                    @if ($errors->has('delivery_price'))
                                        <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                            <strong>{{ $errors->first('delivery_price') }}</strong>
                                            </span>
                                    @endif
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
        $('.dropify').dropify({
            messages: {
                'default': 'إضغط هنا او اسحب وافلت الصورة',
                'replace': 'إسحب وافلت او إضغط للتعديل',
                'remove': 'حذف',
                'error': 'حدث خطأ ما'
            },
            error: {
                'fileSize': 'حجم الصورة كبير (1M max).',
                'fileExtension': 'نوع الصورة غير مدعوم (png - gif - jpg - jpeg)',
            }
        });


    </script>
@endsection

