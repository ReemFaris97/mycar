@extends('admin.layout.master')
@section('title','تعديل المستخدم')

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
                <a href="{{route('users.index')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light" >رجوع لمستخدمي النظام<span class="m-l-5"><i class="fa fa-reply"></i></span></a>
            </div>
            <h4 class="page-title">تعديل المستخدم</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">بيانات المستخدم: {{$user->name}}</h4>

                <div class="row">

                    <form method="post" action="{{route('users.update',$user->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">إسم المستخدم*</label>
                                <div class="col-md-10">
                                    <input type="text" required value="{{$user->name}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="name" class="form-control" placeholder="إسم المستخدم">

                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">رقم الوظيفة*</label>
                                <div class="col-md-10">
                                    <input type="text" required value="{{$user->job_number}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="60"
                                           data-parsley-maxlength-message="أقصى عدد حروف هو 60 حرف"
                                           name="job_number" class="form-control" placeholder="رقم الوظيفة">

                                    @if($errors->has('job_number'))
                                        <p class="help-block">
                                            {{ $errors->first('job_number') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">رقم الجوال*</label>
                                <div class="col-md-10">
                                    <input type="number" required value="{{$user->phone}}"
                                           data-parsley-required-message="هذا الحقل مطلوب"
                                           data-parsley-trigger="keyup"
                                           data-parsley-maxlength="11"
                                           data-parsley-maxlength-message="أقصى عدد ارقام هو 11 حرف"
                                           {{--data-parsley-pattern="^01[0-2]{1}[0-9]{8}"--}}
                                           {{--data-parsley-pattern-message="برجاء إدخال رقم موبايل بصيغة صحيحة"--}}
                                           {{--oninput="this.value = Math.abs(this.value)"--}}
                                           name="phone" class="form-control" placeholder="رقم الجوال">
                                    @if($errors->has('phone'))
                                        <p class="help-block" style="color: #FF0000;">
                                            {{ $errors->first('phone') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">البريد الإلكتروني*</label>
                                <div class="col-md-10">
                                    <input type="email" required value="{{$user->email}}"
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



                        {{--******************************************************************--}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">كلمة السر*</label>
                                <div class="col-md-10">
                                    <input type="password" name="password" id="pass1" value="{{ old('password') }}"
                                           class="form-control"
                                           autocomplete="off"
                                           placeholder="كلمة السر ..."
                                           data-parsley-trigger="keyup"
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


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">تأكيد كلمة السر*</label>
                                <div class="col-md-10">
                                    <input data-parsley-equalto="#pass1" name="password_confirmation" type="password" data-parsley-trigger="keyup"
                                           placeholder="تأكيد كلمة المرور ..." class="form-control"
                                           autocomplete="off"
                                           id="passWord2"
                                           data-parsley-equalto-message="تأكيد كلمة المرور غير متطابقة"
                                           data-parsley-maxlength="55"
                                           data-parsley-minlength="6"
                                           data-parsley-maxlength-message=" أقصى عدد الحروف المسموح بها هى (55) حرف"
                                           data-parsley-minlength-message=" أقل عدد الحروف المسموح بها هى (6) حرف">

                                    @if($errors->has('password_confirmation'))
                                        <p class="help-block erro">
                                            {{ $errors->first('password_confirmation') }}
                                        </p>
                                    @endif

                                </div>
                            </div>
                        </div>

                        {{--*******************************************************************--}}

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">مهمة - صلاحية*</label>
                                <div class="col-md-10">
                                    <select id="role_select" class="col-xs-12 form-control" required
                                            name="role"
                                            data-parsley-required-message="هذا الحقل إجباري">
                                        <option value="" selected disabled>إختار المهمة(الصلاحية)*</option>
                                        <option value="super" @if($user->role == 'super') selected @endif >مدير مسؤول </option>
                                        <option value="technical" @if($user->role == 'technical') selected @endif >فني</option>
                                        <option value="dept_admin" @if($user->role == 'dept_admin') selected @endif >مسؤول قسم</option>
                                        <option value="coordinator" @if($user->role == 'coordinator') selected @endif >منسق أوامر</option>
                                        <option value="warehouse_admin" @if($user->role == 'warehouse_admin') selected @endif >مسؤول مستودع</option>
                                    </select>
                                    @if($errors->has('role'))
                                        <p class="help-block">
                                            {{ $errors->first('role') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label id="spec_label" @if($user->role != 'technical') style="display: none;" @endif  class="col-md-2 control-label">التخصص*</label>
                                <div class="col-md-10">
                                    <select id="spec"  @if($user->role != 'technical') style="display: none;" @endif class="col-xs-12 form-control"
                                             name="specialize_id"
                                    >

                                        @foreach($specializations as $row)
                                            <option value="{{$row->id}}" @if($user->specialize_id == $row->id) selected @endif>{{$row->name}}</option>
                                        @endforeach

                                    </select>
                                    @if($errors->has('specialize_id'))
                                        <p class="help-block erro">
                                            {{ $errors->first('specialize_id') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-6">
                            <div class="form-group">
                                <label id="dept_select_label" @if($user->role != 'dept_admin') style="display: none;" @endif  class="col-md-2 control-label">القسم*</label>
                                <div class="col-md-10">
                                    <select  id="dept_select" @if($user->role != 'dept_admin') style="display: none;" @endif  class="col-xs-12 form-control"
                                            name="dept_id"
                                    >

                                        @foreach($departments as $row)
                                            <option value="{{$row->id}}" @if($user->dept_id == $row->id) selected @endif >{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('dept_id'))
                                        <p class="help-block erro">
                                            {{ $errors->first('dept_id') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">صورة المستخدم (إختياري)</label>
                                <div class="col-md-10">
                                    <input name="image" type="file" class="dropify" data-max-file-size="1M"
                                           data-allowed-file-extensions="png gif jpg jpeg"
                                           data-errors-position="inside"
                                           data-show-remove="false"
                                           data-default-file="{{getimg($user->image)}}"

                                                   />
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


//        $("#spec").hide();
//        $("#spec_label").hide();
//
//        $("#dept_select_label").hide();
//        $("#dept_select").hide();


    </script>

    <script>
        $('#role_select').on('change', function () {

            var role_select = $('#role_select').val();


            console.log(role_select);

            if(role_select === 'technical'){
                $("#spec").show();
                $("#spec_label").show();
                $("#dept_select_label").hide();
                $("#dept_select").hide();

            }

            else if(role_select === 'dept_admin'){
                $("#dept_select_label").show();
                $("#dept_select").show();

                $("#spec").hide();
                $("#spec_label").hide();


            }

            else {
                $("#spec").hide();
                $("#spec_label").hide();

                $("#dept_select_label").hide();
                $("#dept_select").hide();
            }

        });


    </script>

@endsection
