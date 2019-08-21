@extends('website.layouts.master')

@section('styles')
    <!-- This for here -->
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.css')}}">
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
    <section class="TABS">
        <div class="container">
            <div class="row">
                @include('website.profile.side_menu')
                <div class="col-md-10 col-sm-8 col-xs-12 ">
                    <div class="left-tab">
                        <div class="tab-content ">

                            <div class="details waiting-details">
                                <h3 class="h3-after">طلباتي
                                    <!--
                                    <span class="span1"></span>
                                    <span class="span2"></span>
-->
                                </h3>
                                <button type="button" class="return-btn" data-toggle="modal" data-target="#return">
                                    ارجاع الطلب
                                </button>
                                <div class="status-in">
                                    @switch($order->status)

                                        @case('accepted')   <img src="{{asset('website/img/planning.svg')}}">       @break
                                        @case('prepare')    <img src="{{asset('website/img/in-progress.svg')}}">    @break
                                        @case('onWay')      <img src="{{asset('website/img/delivered.svg')}}">      @break
                                        @case('delivered')  <img src="{{asset('website/img/done.svg')}}">           @break
                                    @endswitch
                                </div>
                                <div class="top-details data-user">
                                    <div class="h-ditails">
                                        <ul class="data-top">
                                            <li>طلب رقم
                                                <span>{{$order->id}}</span>
                                            </li>
                                            <li>
                                                التاريخ
                                                <span>{{$order->created_at}}</span>
                                            </li>

                                            <li>
                                                نوع الطلب:
                                                <span>
                                                    @switch($order->status)
                                                    @case('accepted')    قيد التنفيذ  @break
                                                    @case('accepted')    جاري التجهيز @break
                                                    @case('accepted') تم التسليم للمندوب @break
                                                    @case('accepted') تم التوصيل @break
                                                    @endswitch
                                                </span>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="b-details">
                                        <div class="col-md-6 col-xs-12 ">
                                            <ul class="data-left">
                                                <li>العنوان </li>
                                                <li>{{$order->delivery->address}} </li>
                                                <li>المملكة العربية السعودية</li>
                                                <li>الموزع <img src="{{getimg($order->supplier->image)}}"> {{$order->supplier->name}} </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-xs-12">

                                            <ul class="data-right">
                                                @if($order->order_car_type == 1)
                                                <li>
                                                    <span>{{$order->company->name()}}</span>
                                                    <span>{{$order->company_model->name()}}</span>
                                                    <span>{{$order->year}}</span>
                                                </li>
                                                @else
                                                <li>رقم الهيكل :
                                                    <span>{{$order->structre_number}}</span>
                                                    <div>صورة الهيكل :
                                                        <img src="{{getimg($order->form_image)}}">
                                                    </div>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-details data-user payment-data">
                                    <div class="h-ditails">
                                        <ul class="data-top text-center">
                                            <li>
                                                <h5>بيانات الدفع</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="b-details">
                                        <div class="col-md-4 col-xs-12 ">
                                            <ul class="data-right">
                                                <div class="col-xs-12">
                                                    <li class="no-border">نوع الدفع :
                                                        @if($order->payment_type == 'cash')<span>كاش عند الإستلام</span> @endif
                                                        @if($order->payment_type == 'network')<span>الدفع شبكة عند الإستلام</span> @endif

                                                    </li>
                                                </div>
                                            </ul>
                                        </div>

{{--                                        <div class="col-md-8 col-xs-12 text-center">--}}
{{--                                            <ul class="data-left">--}}
{{--                                                <div class="col-xs-6">--}}
{{--                                                    <li>--}}
{{--                                                        **********3355--}}
{{--                                                    </li>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-xs-6">--}}
{{--                                                    <li>--}}
{{--                                                        MOHAMED--}}
{{--                                                    </li>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-xs-6">--}}
{{--                                                    <li>--}}
{{--                                                        9/2020--}}
{{--                                                    </li>--}}
{{--                                                </div>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        --}}
                                    </div>
                                </div>
                                <table class="mytable">
                                    <thead>
                                    <tr>
                                        <th> م</th>
                                        <th> اسم القطعة</th>
                                        <th>قيمة القطعة</th>
                                        <th>الكمية</th>
                                        <th>الإجمالى</th>
                                        <th>صورة القطعة</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bord-t">
                                    @foreach($order->supplierReply()->reply_details as $row)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->order_details->part->name()}}</td>
                                            <td>{{$row->part_price}}</td>
                                            <td>{{$row->order_details->quantity}}</td>
                                            <td>{{$row->total_parts}}</td>
                                            <td><img src="{{getimg($row->order_details->part->image)}}"></td>
                                            {{--                       <td> <button class="close"> <i class="fas fa-times"></i> </button> </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="end-waiting-details">
                                    <div class="total-order">قيمة التوصيل</div>
                                    <div class="all-moany">{{$order->delivery_value}} ريال</div>

                                    <div class="total-order">إجمالي الطلب</div>
                                    <div class="all-moany">{{$order->total}} ريال</div>
                                </div>
                            </div>

                            <!--
                            <div class="details waiting-details">
                                <h3 class="h3-after">طلباتي

                                </h3>
                                <div class="top-details">
                                    <div class="h-ditails">
                                        <ul class="data-top">
                                            <li>طلب رقم
                                                <span>0010005929</span>
                                            </li>
                                            <li>
                                                التاريخ
                                                <span>9/3/2019</span>
                                            </li>

                                            <li>
                                                نوع الطلب:
                                                <span>قيد الانتظار</span>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="b-details">
                                        <div class="col-md-6">
                                            <ul class="data-right">
                                                <li>
                                                    <span>كيا</span>
                                                    <span>سيراتو</span>
                                                    <span>2019</span>
                                                </li>
                                                <li>الحاله :
                                                    <span> طلب جديد</span>
                                                </li>
                                                <li>رقم الهيكل :
                                                    <span>1657445</span>
                                                    <div>صورة الهيكل :
                                                        <img src="img/logo.png">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="data-left">
                                                <li>طريقة الشحن :
                                                    <span>شحن إلي المنزل</span>
                                                </li>
                                                <li>نوع الدفع :
                                                    <span>بطاقة إئتمانية</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <table class="mytable">
                                    <thead>
                                        <tr>
                                            <th> م</th>
                                            <th> اسم القطعة</th>
                                            <th>رقم القطعة</th>
                                            <th>النوع </th>
                                            <th>الكمية</th>
                                            <th>صورة القطعة</th>

                                            <th>العرض</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bord-t">
                                        <tr>
                                            <td>1</td>
                                            <td>حساس ماكينة 1800</td>
                                            <td>1312</td>
                                            <td class="type-native">اصلى</td>
                                            <td> 1</td>
                                            <td> <img src="img/logo.png"></td>

                                            <td>
                                                <div>300</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>صدام خلفى فوق</td>
                                            <td>1450</td>
                                            <td class="type-used">تشليح</td>
                                            <td> 2</td>
                                            <td> <img src="img/logo.png"></td>

                                            <td>
                                                <div>300</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>صدام امامى فوق</td>
                                            <td>1920</td>
                                            <td class="type-orginal">تجارى</td>
                                            <td> 3</td>
                                            <td> <img src="img/logo.png"></td>

                                            <td>
                                                <div>300</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="end-waiting-details">
                                    <div class="total-order">إجمالي الطلب</div>
                                    <div class="all-moany">2700 ريال</div>
                                </div>
                            </div>
-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')

    <!-- -->
    <script src="{{asset('website/js/script.js')}}"></script>

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
    <!------------------------------ Counter ------------------------>
    <script>
        $(document).ready(function() {

            var incrementPlus;
            var incrementMinus;

            var buttonPlus = $(".cart-qty-plus");
            var buttonMinus = $(".cart-qty-minus");

            var incrementPlus = buttonPlus.click(function() {
                var $n = $(this)
                    .parent(".count")
                    .parent(".quant")
                    .find(".number");
                $n.val(Number($n.val()) + 1);

            });

            var incrementMinus = buttonMinus.click(function() {
                var $n = $(this)
                    .parent(".count")
                    .parent(".quant")
                    .find(".number");
                var amount = Number($n.val());
                if (amount > 0) {
                    $n.val(amount - 1);
                }

            });

        });

    </script>
@endsection
