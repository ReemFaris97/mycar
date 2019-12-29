@extends('admin.layout.master')
@section('title','إنشاء مدير مساعد')
@section('styles')
    <style>
        .help-block{
            color: red;
        }
    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{route('admins.index')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light" >رجوع لقائمة المساعدين<span class="m-l-5"><i class="fa fa-reply"></i></span></a>
            </div>
            <h4 class="page-title">إضافة مساعد جديد</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">


                <h4 class="header-title m-t-0 m-b-30">بيانات المساعد</h4>

                <div class="row">

                    <form method="post" action="{{route('admins.store')}}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">الإسم*</label>
                                <div class="col-md-10">
                                    <input type="text" required value="{{old('name')}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="name" class="form-control" placeholder="إسم المساعد">

                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">رقم الهاتف*</label>
                                <div class="col-md-10">
                                    <input type="number" required value="{{old('phone')}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="10"
                                           data-parsley-maxlength-message="أقصى عدد ارقام هو 10 رقم"
                                           {{--oninput="this.value = Math.abs(this.value)"--}}
                                           name="phone" class="form-control" placeholder="رقم الهاتف">
                                    @if($errors->has('phone'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('phone') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">البريد الإلكتروني*</label>
                                <div class="col-md-10">
                                    <input type="email" required value="{{old('email')}}"
                                           data-parsley-type="email"
                                           data-parsley-type-message = "أدخل إيميل صحيح"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="email" class="form-control" placeholder="البريد الإلكتروني">

                                    @if($errors->has('email'))
                                        <p class="help-block">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">كلمة السر*</label>
                                <div class="col-md-10">
                                    <input type="password" name="password" id="pass1" value="{{ old('password') }}"
                                           class="form-control"
                                           placeholder="كلمة السر ..."
                                           required
                                           data-parsley-trigger="keyup"
                                           data-parsley-required-message="كلمة المرور مطلوبة"
                                           data-parsley-maxlength="55"
                                           data-parsley-minlength="6"
                                           data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"
                                           data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف"
                                    />

                                    @if($errors->has('password'))
                                        <p class="help-block">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">تأكيد كلمة السر*</label>
                                <div class="col-md-10">
                                    <input data-parsley-equalto="#pass1" name="password_confirmation" type="password" data-parsley-trigger="keyup"
                                           placeholder="تأكيد كلمة المرور ..." class="form-control"
                                           id="passWord2" required
                                           data-parsley-required-message="تأكيد كلمة المرور مطلوب"
                                           data-parsley-equalto-message="تأكيد كلمة المرور غير متطابقة"
                                           data-parsley-maxlength="55"
                                           data-parsley-minlength="6"
                                           data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"
                                           data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف">

                                    @if($errors->has('password_confirmation'))
                                        <p class="help-block">
                                            {{ $errors->first('password_confirmation') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        {{--<div class="col-sm-6 col-xs-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-2 control-label"> رقم الهوية*</label>--}}
                                {{--<div class="col-md-10">--}}
                                    {{--<input name="identity"  data-parsley-maxlength="20"--}}
                                           {{--data-parsley-maxlength-message="أقصى عدد حروف هو 20 حرف" required data-parsley-required-message="هذا الحقل مطلوب" type="number" class="form-control" placeholder="رقم الهوية">--}}
                                {{--@if($errors->has('identity'))--}}
                                        {{--<p class="help-block">--}}
                                            {{--{{ $errors->first('identity') }}--}}
                                        {{--</p>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-6 col-xs-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-2 control-label"> تاريخ الميلاد*</label>--}}
                                {{--<div class="col-md-10">--}}
                                    {{--<input name="birth_date"  data-parsley-maxlength="20"--}}
                                           {{--data-parsley-maxlength-message="أقصى عدد حروف هو 20 حرف" required data-parsley-required-message="هذا الحقل مطلوب" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">--}}
                                    {{--@if($errors->has('birth_date'))--}}
                                        {{--<p class="help-block">--}}
                                            {{--{{ $errors->first('birth_date') }}--}}
                                        {{--</p>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="col-sm-6 col-xs-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-2 control-label" for="category">المدينة*</label>--}}
                                {{--<div class="col-md-10">--}}
                                {{--<select class="form-control" required--}}
                                        {{--name="city_id" id="city"--}}
                                        {{--data-parsley-trigger="select"--}}
                                        {{--data-parsley-required-message="هذا الحقل إجباري">--}}
                                    {{--<option value="" selected disabled>إختار المدينة</option>--}}
                                    {{--@foreach($cities as $city)--}}
                                        {{--<option value="{{$city->id}}">{{$city->name}}</option>--}}
                                        {{--@endforeach--}}
                                {{--</select>--}}
                                    {{--<div class="col-md-10">--}}
                                {{--@if ($errors->has('city_id'))--}}
                                    {{--<span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">--}}
                                            {{--<strong>{{ $errors->first('city_id') }}</strong>--}}
                                            {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}



                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">صورة شخصية (إختياري)</label>
                                <div class="col-md-10">
                                    <input name="image" type="file" class="dropify" data-max-file-size="1M"
                                           data-allowed-file-extensions="png gif jpg jpeg"
                                           data-errors-position="inside"
                                    />
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="category">الأدوار*</label>
                                <div class="col-md-10">
                                    @foreach($roles as  $value)
                                        <div class="col-sm-4">
                                            <div class="checkbox checkbox-primary">
                                                <input name="roles[]" value="{{ $value->id }}" {{ (collect(old('roles'))->contains($value->name)) ? 'checked':'' }} required id="checkbox{{ $value->id }}"
                                                       type="checkbox" class="requiredField"
                                                       data-parsley-required-message="برجاء إختيار دور واحد على الأقل">
                                                <label for="checkbox{{ $value->id }}">
                                                    {{ $value->title }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>





                        {{-- buttons --}}
                        <div class="col-xs-12">
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
