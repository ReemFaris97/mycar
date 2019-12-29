@extends('admin.layout.master')
@section('title','لوحة تحكم قطعة سيارتي')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <h4 class="page-title">الصفحة الرئيسية</h4>
        </div>
    </div>


    <div class="row">


        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">عدد المستخدمين</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#188AE2"
                               data-bgColor="#D0E8F9" value="{{$data['users']}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['users']}} <i style="color: #188AE2;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">مستخدم</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">عدد الشركات المصنعة</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#188AE2"
                               data-bgColor="#D0E8F9" value="{{$data['companies']}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['companies']}} <i style="color: #188AE2;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">شركة</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">الموديلات</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#188AE2"
                               data-bgColor="#D0E8F9" value="{{$data['Models']}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['Models']}} <i style="color: #188AE2;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">الموديلات</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">الموردين</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#188AE2"
                               data-bgColor="#D0E8F9" value="{{$data['suppliers']}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['suppliers']}} <i style="color: #188AE2;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">الموردين</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">عدد القطع و المنتجات</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#188AE2"
                               data-bgColor="#D0E8F9" value="{{$data['parts']}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['parts']}} <i style="color: #188AE2;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">قطعة</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->


@endsection
