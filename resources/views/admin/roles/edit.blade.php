@extends('admin.layout.master')
@section('title','تعديل الدور')



@section('content')

    <form method="POST" action="{{ route('roles.update',$role->id)  }}" enctype="multipart/form-data" data-parsley-validate
          novalidate>
    {{ csrf_field() }}
        {{method_field('PUT')}}


    <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="btn-group pull-right m-t-15">

                    <a href="{{route('roles.index')}}" type="button" class="btn btn-custom  waves-effect waves-light">رجوع</a>

                </div>
                <h4 class="page-title">تعديل الدور :{{ $role->title }}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card-box">

                    <h4 class="header-title m-t-0 m-b-30">بيانات الدور</h4>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="userName">الإسم*</label>
                            <input type="text" name="title" value="{{$role->title }}" class="form-control"
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

                    </div>

                    <div class="col-xs-12">
                        <label for="abilities">الصلاحيات *</label>
                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">

                            @foreach($abilities as  $ability)

                                <div class="col-sm-4">
                                    <div class="checkbox checkbox-primary">
                                        <input name="abilities[]" value="{{ $ability->id }}"
                                               @if($role->abilities->pluck('name','name'))
                                                       @foreach($role->abilities->pluck('name','name') as $abilityValue)
                                                        @if($abilityValue == $ability->name)
                                                            checked
                                                        @endif
                                                       @endforeach
                                               @endif

                                               required id="checkbox{{ $ability->id }}"
                                               type="checkbox">
                                        <label style="font-weight:bold" for="checkbox{{ $ability->id }}">
                                            {{ $ability->title }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>


                    <div class="form-group text-right m-t-20">
                        <button class="btn btn-primary waves-effect waves-light m-t-20" type="submit">
                            حفظ
                        </button>
                        <button onclick="window.history.back();return false;" type="reset"
                                class="btn btn-default waves-effect waves-light m-l-5 m-t-20">
                            إلغاء
                        </button>
                    </div>

                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->
    </form>


@endsection
