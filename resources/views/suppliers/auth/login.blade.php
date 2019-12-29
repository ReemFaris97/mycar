@extends('suppliers.auth.master')
@section('content')
    {{----------------------------------------------------------------}}
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">@lang('suppliers.login') @lang('suppliers.supplier')</h4>
        </div>
        <div class="panel-body">

            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> {{ session()->get('loginError') }}</strong>
                </div>
            @endif
                {{--@if(session()->has('suspendError'))--}}
                    {{--<div class="alert alert-danger alert-dismissable">--}}
                        {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                        {{--<strong> {{ session()->get('suspendError') }}</strong>--}}
                    {{--</div>--}}
                {{--@endif--}}

                <form class="form-horizontal m-t-20" action="{{route('supplier.postPhone')}}" method="post">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="phone" value="{{ old('phone') }}"
                               autofocus
                               class="form-control"
                               {{--data-parsley-type="email"--}}
                               {{--data-parsley-type-message="هذا الحقل يجب ان يكون بصيغة إيميل صحيحة"--}}
                               data-parsley-required
                               autocomplete="off"
                               data-parsley-required-message="@lang('suppliers.field_required')"
                               placeholder="@lang('suppliers.enter_phone')">

                        @if ($errors->has('phone'))
                            <span class="help-block error_validation" style=" font-size: 13px;color: #ff5757;">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

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
                        @if(app()->getLocale() == "ar")
                            <a style="font-size: 19px; line-height: 63px; margin-right: 15px;" href="{{route('lang',['en'])}}" class="lang">English<img alt="english" style="width: 40px;height: 20px; margin-right: 7px;" src="{{asset('supplier/assets/images/flag2.jpg')}}"></a>
                        @else
                            <a style="font-size: 19px; line-height: 63px; margin-right: 15px;" href="{{route('lang',['ar'])}}" class="lang">العربية<img alt="arabic"  style="width: 40px;height: 20px; margin-right: 7px;" src="{{asset('supplier/assets/images/flag1.jpg')}}"></a>
                        @endif
                        </div>
                    </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">@lang('suppliers.send')</button>
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
