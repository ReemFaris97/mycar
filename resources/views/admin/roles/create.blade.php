@extends('admin.layout.master')
@section('title','إنشاء دور جديد')



@section('content')



    <div class="row">
        <div class="col-sm-12">

            <form method="POST" action="{{ route('roles.store')  }}" enctype="multipart/form-data" data-parsley-validate
                  novalidate>
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="btn-group pull-right m-t-15">
                            <a href="{{route('roles.index')}}" type="button" class="btn btn-custom  waves-effect waves-light"> رجوع <span class="m-l-5"><i
                                        class="fa fa-reply"></i></span>
                            </a>
                        </div>
                        <!-- Page-Title -->
                        <h4 class="page-title">إضافة دور</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">بيانات الدور</h4>
                            <div class="row">
                                <div class="col-xs-12">



                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="userName">الإسم*</label>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                               required
                                               data-parsley-required-message="هذا الحقل مطلوب"
                                               placeholder="إسم الدور"/>
                                        <p class="help-block" id="error_userName"></p>
                                        @if($errors->has('title'))
                                            <p class="help-block validationStyle">
                                                {{ $errors->first('title') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="abilities">الصلاحيات *</label>
                                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">

                                            @foreach($abilities as  $ability)

                                                <div class="col-sm-4">
                                                    <div class="checkbox checkbox-primary">
                                                        <input name="abilities[]" value="{{ $ability->id }}" required id="checkbox{{ $ability->id }}"
                                                               type="checkbox">
                                                        <label style="font-weight:bold" for="checkbox{{ $ability->id }}">
                                                            {{ $ability->title }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
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
