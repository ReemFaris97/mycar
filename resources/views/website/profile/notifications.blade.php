@extends('website.layouts.master')

@section('styles')
    <!-- This for here -->


    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style1.css')}}">
    <script src="{{asset('website/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('website/js/respond.min.js')}}"></script>
@endsection

@section('content')


    <section class="TABS">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-12 right-tab">
                    <ul class="nav nav-tabs contan-tabs">
                        <li><a href="{{route('web.profile')}}"><i class="fas fa-user"></i> معلومات الحساب </a></li>
                        <li><a href="entitlements.html"><i class="fas fa-file-alt"></i> مستحقاتي</a></li>
                        <li><a href="requests.html"><i class="fas fa-list"></i> طلباتي</a></li>
                        <li class="active"><a href="{{route('web.notifications')}}"><i class="fas fa-bell"></i> الاشعارات</a></li>
                        <li><a href="index.html"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج </a></li>
                    </ul>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-12">
                    <div class="left-tab">
                        <div class="tab-content">

                            <div class="notifiction">
                                <h3 class="h3-after">الاشعارات
                                    <!--
                                                                        <span class="span1"></span>
                                                                        <span class="span2"></span>
                                    -->
                                </h3>

                                <div class="notice">
                                    <button type="button" class="close">×</button>
                                    <img src="img/bell.svg">
                                    <a href="#"> لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>
                                </div>

                                <div class="notice">
                                    <button type="button" class="close">×</button>
                                    <img src="img/bell.svg">
                                    <a href="#">لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>
                                </div>

                                <div class="notice back-gr">
                                    <button type="button" class="close">&times;</button>
                                    <img src="img/bell.svg">
                                    <a href="#"> لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>
                                </div>
                                <div class="notice back-gr">
                                    <button type="button" class="close">&times;</button>
                                    <img src="img/bell.svg">
                                    <a href="#"> لا يوجد لديك عرض جديد بخصوص طلب رقم 24843</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            $(".close").on('click' , function(){
                $(this).parents('.notice').remove();
            })
        })

    </script>

@endsection
