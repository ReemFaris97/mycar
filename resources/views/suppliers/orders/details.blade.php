@extends('suppliers.layout.master')
@section('title',"تفاصيل الطلب")


{{--@section('styles')--}}
{{--<style>--}}
{{--.dataTables_filter, .dataTables_info, .pagination { display: none; }--}}
{{--</style>--}}
{{--<style type="text/css" media="print">--}}
{{--.prevent, .no-print,.dt-buttons,.dataTables_filter,.dataTables_info,.pagination { display: none; }--}}
{{--</style>--}}
{{--@endsection--}}
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                <button onclick="window.history.back();"  class="no-print btn btn-custom dropdown-toggle waves-effect waves-light">
                    رجوع
                    <span class="m-l-5"><i class="fa fa-arrow-left"></i></span>
                </button>

            </div>

            <h4 class="page-title">تفاصيل الطلب رقم : {{$order->id}}</h4>
        </div>
    </div><!--End Page-Title -->


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h2 class="header-title m-t-0 m-b-30">بيانات الطلب رقم : {{$order->id}}</h2>
                {{--<button onclick="window.print();"  class="no-print btn btn-custom dropdown-toggle waves-effect waves-light">--}}
                {{--طباعة تقرير كامل--}}
                {{--<span class="m-l-5"><i class="fa fa-print"></i></span>--}}
                {{--</button>--}}
                <div class="row">
                    <div class="col-sm-12">


                        <div class="col-md-4">
                            <h4>إسم مقدم الطلب:</h4>
                            <h5 style="font-weight: 600;">{{$order->user->name}}</h5>
                        </div>

                        <div class="col-md-4">
                        <h4>حالة الطلب :</h4>
                        <h5 style="font-weight: 600;">

                        </h5>
                        </div>


                        <div class="col-md-4">
                            <h4>المدينة: </h4>
                            <h5 style="font-weight: 600;">{{$order->city->ar_name}}</h5>
                        </div>


                        <div class="col-md-12">
                            <h3>بيانات السيارة:</h3>
                            <h5 style="font-weight: 600;">

                            </h5>
                        </div>

                        <div class="col-md-4">
                            <h4>الشركة المصنعة: </h4>
                            <h5 style="font-weight: 600;">{{$order->company->ar_name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>الموديل : </h4>
                            <h5 style="font-weight: 600;">{{$order->company_model->ar_name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>سنة الإنتاج : </h4>
                            <h5 style="font-weight: 600;">{{$order->year}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>سعر التوصيل : </h4>
                            <h5 style="font-weight: 600;">{{$order->city->delivery_price}}</h5>
                        </div>



                        <div class="col-md-12">
                            <h3>منتجات الطلب:</h3>
                            <h5 style="font-weight: 600;">

                            </h5>
                        </div>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>م</th>
                                <th>إسم القطعة</th>
                                <th>رقم الهيكل</th>
                                <th>صورة الاستمارة</th>
                                <th>جديد او مستعمل</th>
                                <th>عدد القطع</th>
                                <th>صورة للقطعة</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($order->order_details as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->part->ar_name}}</td>
                                    <td>{{$order->structure_number}}</td>

                                    <td style="width: 10%;">
                                        <a data-fancybox="gallery"
                                           href="">
                                            <img style="width: 50%; border-radius: 50%; height: 49px;"
                                                 src=""/>
                                        </a>

                                    </td>


                                    <td>
                                        @if($order->parts_type == 'new')
                                            جديد
                                            @else
                                            مستعمل
                                        @endif
                                    </td>
                                    <td>{{$row->quantity}}</td>

                                    <td style="width: 10%;">
                                        <a data-fancybox="gallery"
                                           href="">
                                            <img style="width: 50%; border-radius: 50%; height: 49px;"
                                                 src=""/>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>








                        {{--<div class="col-md-4">--}}
                            {{--<h4>الصورة الشخصية</h4>--}}
                            {{--<div  style="width: 200px; height: 150px;">--}}
                                {{--@if($user->image)--}}
                                    {{--<a href="{{getimg($user->image)}}" class="image-popup" title="Screenshot-1">--}}
                                        {{--<img width="200" height="150" src="{{getimg($user->image)}}" class="thumb-img" alt="work-thumbnail">--}}
                                    {{--</a>--}}
                                {{--@else--}}
                                    {{--<a href="{{asset('admin/assets/images/noimage.png')}}" class=" image-popup" title="Screenshot-1">--}}
                                        {{--<img width="200" height="150" src="{{asset('admin/assets/images/noimage.png')}}" class="thumb-img" alt="work-thumbnail">--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                </div> <!--End of row-->

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable-responsive2').DataTable({
                columnDefs: [{orderable: false, targets: [0]}],
                "language": {
                "lengthMenu": " عرض _MENU_ الصفحة",
                    "info": "عرض الصفحة _PAGE_ من  _PAGES_",
                    "infoEmpty": "لا يوجد بيانات متاحة الآن",
                    "infoFiltered": "(التصفية _MAX_ من الإجمالي)",
                    "paginate": {
                    "first": "الأولى",
                        "last": "الأخيرة",
                        "next": "التالي",
                        "previous": "السابق"
                },
                "search": "بحث:",
                    "zeroRecords": "لا يوجد نتيجة لبحثك",
            },});

        } );
        TableManageButtons.init();

    </script>

@endsection
