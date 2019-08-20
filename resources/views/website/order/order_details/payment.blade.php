@extends('website.layouts.master')

@section('styles')
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
    <style>
        .parsley-errors-list{
            color: red;
        }
    </style>

@endsection

@section('content')

    <section class="all-sections">
        <div class="container">
            <button type="button" class="delt-all">إلغاء الطلب</button>
            <h3 class="h3-after">الأسعار</h3>
            <a href="#" class="trn">سياسة الإرجاع</a>
            <div class="the-distrb">
                <b>الموزع : <h4>الفطيم لتجارة قطع الغيار</h4></b>

                <div class="tfasel">
                    <div class="tools"></div>

                    <table class="mytable">
                        <thead>
                        <tr>
                            <th>م</th>
                            <th>اسم القطعة</th>
                            <th>قيمة القطعة</th>
                            <th>الكمية</th>
                            <th>الإجمالى</th>
                            <th>صورة القطعة</th>
                {{--<th>حذف</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->supplierReply()->reply_details as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->order_details->part->name()}}</td>
                                <td>{{$row->part_price}}</td>
                                <td>{{$row->order_details->quantity}}</td>
                                <td>{{$row->total_parts}}</td>
                                <td><img src="{{getimg($row->order_details->part->image)}}"></td>
                                {{--                            <td> <button class="close"> <i class="fas fa-times"></i> </button> </td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                    <table class="p-tble">
                        <tr>
                            <th>الإجمالى</th>
                            <td>{{$order->total}}  ريال</td>
                        </tr>
                        <tr>
                            <th>قيمة التوصيل</th>
                            <td>{{$order->delivery_value}} ريال</td>
                        </tr>
                        <tr>
                            <th>إجمالى الطلب</th>
                            <td>{{$order->delivery_value + $order->total}} ريال</td>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="sha7n">
                <h3 class="h3-after">الدفع</h3>

                <form class="deliver" method="post" action="{{route('web.order.submitPayment')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="radio-list dist-list">

                        <label class="rad">
                            <div class="checking">
                                <span class="check-img">
                                    <img src="{{asset('website/img/money.svg')}}">
                                </span>
                                نقدى عند الاستلام كاش</div>
                            <input type="radio" checked="checked" name="payment_type" value="cash">
                            <span class="checkmark"></span>
                        </label>


                        <label class="rad">
                            <div class="checking">
                                <span class="check-img">
                                    <img src="{{asset('website/img/money.svg')}}">
                                </span>
                                نقدى عند الاستلام شبكة
                            </div>
                            <input type="radio" name="payment_type" value="network">
                            <span class="checkmark"></span>
                        </label>

{{--                        <label class="rad">--}}
{{--                            <div class="checking">--}}
{{--                                <span class="check-img">--}}
{{--                                    <img src="img/credit-card.svg">--}}
{{--                                </span>--}}
{{--                                دفع إلكترونى (فيزا - ماستر - مدى)</div>--}}
{{--                            <input type="radio" name="payment_type" onclick="show1();" id="chk1">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}


{{--                        <label class="rad">--}}
{{--                            <div class="checking">--}}
{{--                                <span class="check-img">--}}
{{--                                    <img src="img/bank-transfer-logo.svg">--}}
{{--                                </span>--}}
{{--                                تحويل بنكى--}}
{{--                            </div>--}}
{{--                            <input type="radio" name="payment_type" onclick="show2();" id="chk2">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}


{{--                        <div class="maps">--}}
{{--                            <div class="map1 carry" id="div1">--}}


{{--                                <div class="form-group">--}}
{{--                                    <img src="img/credit-card.svg" class="form-img">--}}
{{--                                    <input type="number" class="form-control" placeholder="رقم الكارت">--}}
{{--                                    <span class="focus-border"><i></i></span>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <img src="img/deliver1.svg" class="form-img">--}}
{{--                                    <input type="text" class="form-control" placeholder="اسم حامل الكارت">--}}
{{--                                    <span class="focus-border"><i></i></span>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <img src="img/lock.svg" class="form-img">--}}
{{--                                    <input type="text" class="form-control" placeholder="الرقم السرى">--}}
{{--                                    <span class="focus-border"><i></i></span>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <img src="img/calendar.svg" class="form-img">--}}
{{--                                    <input type="data" class="form-control" placeholder="تاريخ الانتهاء">--}}
{{--                                    <span class="focus-border"><i></i></span>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="map2 carry2" id="div2">--}}

{{--                                <div class="company-radio">--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                            <div class="rad1">--}}
{{--                                                <input type="radio" name="choice" id="choose-1" class="required" />--}}
{{--                                                <label for="choose-1" class="lbl1">--}}
{{--                                                    <img src="img/bank1.svg" />--}}
{{--                                                    <p>شركة قطعة سيارتى</p>--}}
{{--                                                    <p>SA 658456251</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                            <div class="rad1">--}}
{{--                                                <input type="radio" name="choice" id="choose-2" class="required" />--}}
{{--                                                <label for="choose-2" class="lbl1">--}}
{{--                                                    <img src="img/bank2.jpg" />--}}
{{--                                                    <p>شركة قطعة سيارتى</p>--}}
{{--                                                    <p>SA 658456251</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                            <div class="rad1">--}}
{{--                                                <input type="radio" name="choice" id="choose-3" class="required" />--}}
{{--                                                <label for="choose-3" class="lbl1">--}}
{{--                                                    <img src="img/bank3.png" />--}}
{{--                                                    <p>شركة قطعة سيارتى</p>--}}
{{--                                                    <p>SA 658456251</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                                            <div class="rad1">--}}
{{--                                                <input type="radio" name="choice" id="choose-4" class="required" />--}}
{{--                                                <label for="choose-4" class="lbl1">--}}
{{--                                                    <img src="img/bank4.png" />--}}
{{--                                                    <p>شركة قطعة سيارتى</p>--}}
{{--                                                    <p>SA 658456251</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-xs-12">--}}
{{--                                            <div class="profile-pic">--}}
{{--                                                <p class="bold-in"> إرفق صورة التحويل </p>--}}
{{--                                                <div class="images-upload-block">--}}
{{--                                                    <label class="upload-img photo" for="upp-btn">--}}
{{--                                                        <input type="file" id="upp-btn" accept="image/*" class="image-uploader form-control">--}}
{{--                                                        <b> <i class="fas fa-image"></i></b>--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                                <div class="images-upload-block" id="appended-pic"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}



{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

                    </div>

                    <button type="submit" class="delt-all">إتمام الطلب</button>

                </form>

            </div>

        </div>
    </section>


@endsection


@section('scripts')
    <script>
        // $(document).ready(function() {
        //     $(".close").click(function() {
        //         $(this).closest("tr").fadeOut(500);
        //     });
        // });

    </script>
    <!--------- Data Table ---------------->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.foundation.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.uikit.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('admin/assets/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('form').parsley();
            $('.mytable').DataTable({
                responsive: true
            });
        });

    </script>

    <!--------- Deliver Button ----------->
    <script>
        $(document).ready(function() {

            $("#div1").hide();
            $("#div2").hide();

            $(function() {
                $("input[name='payment_type']").click(function() {
                    if ($("#chk1").is(":checked")) {

                        $("#div1").show();
                    } else {
                        $("#div1").hide();
                    }
                });

                $("input[name='payment_type']").click(function() {
                    if ($("#chk2").is(":checked")) {

                        $("#div2").show();
                    } else {
                        $("#div2").hide();
                    }
                });

            });

        });

    </script>


@endsection
