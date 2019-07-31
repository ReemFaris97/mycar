@extends('website.layouts.master')

@section('styles')
    <!-- This for here -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.foundation.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.uikit.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables_themeroller.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style1.css')}}">
    <script src="{{asset('website/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('website/js/respond.min.js')}}"></script>
@endsection

@section('content')


    <section class="TABS" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-12 right-tab">
                    <ul class="nav nav-tabs contan-tabs">
                        <li class="active"><a  href="{{route('web.profile')}}"><i class="fas fa-user"></i> معلومات الحساب </a></li>
{{--                        <!------- show   this in  user ------->   <li><a  href="entitlements.html"><i class="fas fa-file-alt"></i> مستحقاتي</a></li>--}}
                        <li><a href="requests.html"><i class="fas fa-list"></i> طلباتي</a></li>
                        <li><a  href="{{route('web.notifications')}}"><i class="fas fa-bell"></i> الاشعارات</a></li>
                        <li><a  href="index.html"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج </a></li>
                    </ul>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-12 ">
                    <div class="left-tab">
                        <div class="tab-content">
                            <div id="home" class="in active">
                                <h3 class="h3-after">معلوماتى
                                    <!--
                     <span class="span1"></span>
                     <span class="span2"></span>
                                    -->
                                </h3>
                                <h4>المعلومات الشخصية</h4>
                                <ul>
                                    <li>@lang('web.name') :
                                        <span class="name-account"> {{optional($user)->name}}</span>
                                    </li>
                                    <li>@lang('web.phone') :
                                        <span class="phone-number">{{$user->phone}}</span>
                                    </li>

                                    <!------- show   this in  user ------->
{{--                                    <li> رقم السجل التجاري :--}}
{{--                                        <span class="number-record">122</span>--}}
{{--                                    </li>--}}
{{--                                    <li> صورة السجل :--}}
{{--                                        <img class="img-record" src="{{asset('website/img/logo-sm.png')}}">--}}
{{--                                    </li>--}}
{{--                                    <li> صورة المحل :--}}
{{--                                        <img class="img-shop" src="{{asset('website/img/logo-sm.png')}}">--}}
{{--                                    </li>--}}
                                    <!------------------>

                                    <li> @lang('web.address') :
                                        <span class="place">{{optional($user)->address}}</span>
                                    </li>
                                    <li>
                                        <a href="modify.html">تعديل</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.foundation.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.uikit.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.mytable').DataTable({
                responsive:true
            });
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });
        });

    </script>
@endsection
