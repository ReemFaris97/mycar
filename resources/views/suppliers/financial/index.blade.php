@extends('suppliers.layout.master')
@section('title','لوحة تحكم الموردين')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <h4 class="page-title">المستحقات المالية</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">إجمالي المبيعات</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['totalSales']}} </h2>
                        <span>ريال</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">صافي الربح</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['netProfit'] }} </h2>
                        <span>ريال</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">المبلغ الذي تم تحويله</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{$data['receivedMoney']}} </h2>
                        <span>ريال</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">المستحق من النظام</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{auth()->user()->wallet()}} </h2>
                        <span>ريال</span>
                    </div>
                </div>
            </div>
        </div>






    </div>
    <!-- end row -->


@endsection
