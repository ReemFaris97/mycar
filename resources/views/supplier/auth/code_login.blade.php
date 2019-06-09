@extends('supplier.auth.master')
@section('content')
    {{----------------------------------------------------------------}}
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">كود الدخول (مورد)</h4>
        </div>
        <div class="panel-body">

            @if(session()->has('code_sent'))
                <div class="success alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> {{ session()->get('code_sent') }}</strong>
                </div>
            @endif

                @if(session()->has('code_error'))
                    <div class="danger alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ session()->get('code_error') }}</strong>
                    </div>
                @endif

            <form class="form-horizontal m-t-20" action="{{route('supplier.postLogin')}}" method="post">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="code" value="{{ old('code') }}"
                               autofocus
                               class="form-control"
                               {{--data-parsley-type="email"--}}
                               {{--data-parsley-type-message="هذا الحقل يجب ان يكون بصيغة إيميل صحيحة"--}}
                               data-parsley-required
                               autocomplete="off"
                               data-parsley-required-message="هذا الحقل مطلوب"
                               placeholder="أدخل الكود المرسل على الجوال .. ">

                        @if ($errors->has('code'))
                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="phone" value="{{$user->phone}}">

                {{--<div class="form-group">--}}
                {{--<div class="col-xs-12">--}}
                {{--<input name="password"--}}
                {{--class="form-control"--}}
                {{--type="password"--}}
                {{--autocomplete="off"--}}
                {{--data-parsley-required--}}
                {{--data-parsley-required-message="هذا الحقل مطلوب"--}}
                {{--placeholder="كلمة المرور">--}}

                {{--@if ($errors->has('password'))--}}
                {{--<span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">--}}
                {{--<strong>{{ $errors->first('password') }}</strong>--}}
                {{--</span>--}}
                {{--@endif--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group ">--}}
                {{--<div class="col-xs-12">--}}
                {{--<div class="checkbox checkbox-custom">--}}
                {{--<input id="checkbox-signup" type="checkbox">--}}
                {{--<label for="checkbox-signup">--}}
                {{--</label>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--</div>--}}              {{--تذكرني--}}


                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">دخول</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        {{--<a href="{{route('administrator.password.request')}}" class="text-muted"><i class="fa fa-lock m-r-5"></i>نسيت كلمة المرور</a>--}}
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- end card-box-->
    {{--------------------------------      --------------------------------}}



@endsection
