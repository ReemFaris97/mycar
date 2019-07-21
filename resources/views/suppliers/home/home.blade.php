@extends('suppliers.layout.master')
@section('title',__('suppliers.suppliers_panel'))

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <h4 class="page-title">@lang('suppliers.main_page')</h4>
        </div>
    </div>


    <div class="row">


        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">إحصائية</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ff5e00"
                               data-bgColor="rgba(249, 162, 112, .7)" value="0"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> 00 <i style="color: #ff5e00;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">قسم</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">إحصائية</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ff5e00"
                               data-bgColor="rgba(249, 162, 112, .7)" value="0"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> 00 <i style="color: #ff5e00;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">قسم</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">إحصائية</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ff5e00"
                               data-bgColor="rgba(249, 162, 112, .7)" value="0"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> 00 <i style="color: #ff5e00;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">قسم</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">إحصائية</h4>
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ff5e00"
                               data-bgColor="rgba(249, 162, 112, .7)" value="0"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> 00 <i style="color: #ff5e00;" class="fa fa-object-ungroup"></i></h2>
                        <p class="text-muted">قسم</p>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- end row -->


@endsection
