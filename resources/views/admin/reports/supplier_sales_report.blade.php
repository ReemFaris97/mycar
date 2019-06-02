@extends('admin.layout.master')
@section('title',"تقارير مبيعات مورد")

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <div class="btn-group pull-right m-t-15">
                {{--<a href="{{route('orders.create')}}" class="btn btn-custom dropdown-toggle waves-effect waves-light">--}}
                {{--إنشاء طلب جديد--}}
                {{--<span class="m-l-5"><i class="fa fa-plus"></i></span>--}}
                {{--</a>--}}

            </div>

            <h4 class="page-title">تقارير المبيعات</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">فلترة الطلبات</h4>
                <div class="row">
                    <form class="form-inline" enctype="multipart/form-data" method="get" action="">

                        <div class="row" >


                            <div class="col-md-4">
                                <label class=" control-label">إختار المورد</label>
                                <select class="form-control" name="supplier_id">
                                    <option value="">إختار المورد</option>
                                    {{--@foreach($technicals as $technical)--}}
                                        {{--<option value="{{$technical->id}}" @if(request('technical_id') == $technical->id) selected @endif >{{$technical->name}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>


                            <div class="col-md-4">
                                <label class=" control-label">إختار نوع الدفع</label>
                                <select class="form-control" name="supplier_id">
                                    <option value="" selected>الكل</option>
                                    <option value="">كاش</option>
                                    <option value="">إلكتروني</option>
                                    <option value="">شبكة</option>
                                    {{--@foreach($technicals as $technical)--}}
                                    {{--<option value="{{$technical->id}}" @if(request('technical_id') == $technical->id) selected @endif >{{$technical->name}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>

                            {{--<div class="col-md-4">--}}
                                {{--<label class=" control-label">إختار قسم</label>--}}
                                {{--<select class="form-control" name="dept_id">--}}
                                    {{--<option value="">الكل</option>--}}
                                    {{--@foreach($departments as $dept)--}}
                                        {{--<option value="{{$dept->id}}" @if(request('dept_id') == $dept->id) selected @endif >{{$dept->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}


                            {{--<div class="col-md-4">--}}
                                {{--<label class=" control-label">حالة الطلب</label>--}}
                                {{--<select class="form-control" name="status">--}}

                                    {{--<option value="" @if(request('status') == "") selected @endif >                              الكل </option>--}}
                                    {{--<option value="new" @if(request('status') == "new") selected @endif >                        جديدة</option>--}}
                                    {{--<option value="pending" @if(request('status') == "pending") selected @endif >   في إنتظار الموافقة</option>--}}
                                    {{--<option value="accepted" @if(request('status') == "accepted") selected @endif >  مفتوحة مع الفنيين</option>--}}
                                    {{--<option value="completed" @if(request('status') == "completed") selected @endif >           منتهية</option>--}}
                                    {{--<option value="finished" @if(request('status') == "finished") selected @endif >             مكتملة</option>--}}
                                    {{--<option value="not_completed" @if(request('status') == "not_completed") selected @endif >غير مكتمل</option>--}}
                                    {{--<option value="refused" @if(request('status') == "refused") selected @endif >               مرفوضة</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}



                        </div>

                        <div class="row" style="margin: 10px">
                            <div class="col-md-4">
                                <label class=" control-label">من</label>
                                <div class="input-group">
                                    <input name="from" type="text" class="form-control" value="{{request('from')}}" placeholder="mm/dd/yyyy" id="datepicker1">
                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label class=" control-label">إلى</label>
                                <div class="input-group">
                                    <input name="to" type="text" class="form-control" value="{{request('to')}}" placeholder="mm/dd/yyyy" id="datepicker2">
                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary form-control">بحث (فلترة)</button>
                            </div>
                        </div>

                    </form>
                </div>

                <table id="datatable-responsivex" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 20px;">رقم الطلب</th>
                        <th style="width: 160px;">تاريخ الطلب</th>
                        <th>نوع الدفع</th>
                        <th>قيمة الطلب</th>
                        <th style="width: 150px;">قيمة التوصيل</th>
                        <th style="width: 150px;">قيمة نسبة التطبيق</th>
                        <th style="width: 150px;">قيمة مبلغ المورد</th>
                        <th>خيارات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    {{--@foreach($orders as $row)--}}
                        {{--<tr>--}}
                            {{--<td>{{$row->id}}</td>--}}
                            {{--<td>{{$row->created_at}}</td>--}}
                            {{--<td>{{$row->name}}</td>--}}
                            {{--<td>{{$row->technical->name}}</td>--}}
                            {{--<td>{{$row->department->name}}</td>--}}
                            {{--<td>--}}
                                {{--@foreach($row->refuses as $refuse)--}}
                                    {{--<h5>{{$refuse->user->name}}</h5>--}}
                                    {{--<li>{{$refuse->refuse_reason}}</li>--}}
                                {{--@endforeach--}}


                            {{--</td>--}}
                            {{--<td>--}}
                                {{--@switch($row->status)--}}
                                    {{--@case('new')        <label  class="label label-info label-rounded w-md waves-effect waves-light m-b-5">جديد</label>                        @break--}}
                                    {{--@case('pending')    <label  class="label label-primary label-rounded w-md waves-effect waves-light m-b-5">في إنتظار موافقة الفني</label>   @break--}}
                                    {{--@case('accepted')--}}
                                    {{--<label  class="label label-warning label-rounded w-md waves-effect waves-light m-b-5">تم الموافقة من الفني</label>--}}
                                    {{--@if(isset($row->exchange))--}}
                                        {{--<label  class="label label-purple label-rounded w-md waves-effect waves-light m-b-5">يوجد أمر صرف</label>--}}
                                    {{--@endif--}}
                                    {{--@break--}}
                                    {{--@case('completed')  <label  class="label label-purple  label-rounded w-md waves-effect waves-light m-b-5">تم الإنتهاء</label>               @break--}}
                                    {{--@case('not_completed')  <label  class="label label-danger  label-rounded w-md waves-effect waves-light m-b-5">لم يكتمل</label>               @break--}}
                                    {{--@case('finished')   <label  class="label label-success label-rounded w-md waves-effect waves-light m-b-5">إكتمل الطلب</label>              @break--}}
                                    {{--@case('refused')    <label  class="label label-danger label-rounded w-md waves-effect waves-light m-b-5">تم الرفض</label>                  @break--}}
                                {{--@endswitch--}}
                            {{--</td>--}}

                            {{--<td>--}}

                            {{--<a href="{{route('products.edit',$row->id)}}" class="label label-warning">تعديل</a>--}}
                            {{--<a  id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-url="{{route('products.destroy',$row->id)}}" class="removeElement label label-danger">حذف</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        // Date Picker
        jQuery('#datepicker1').datepicker();
        jQuery('#datepicker2').datepicker();

        $('#datatable-responsivex').DataTable({
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
                "zeroRecords": "لا يوجد بيانات متاحة الآن",
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        columns: [4, 3, 2, 1, 0]
                    },
                    className:"btn btn-success"
                },
                {
                    extend: 'print',
                    text: 'PDF',
                    exportOptions: {
                        columns: [4,3,2,1,0]
                    } ,
                    className:"btn btn-inverse"

                },
            ],
        });

    </script>
@endsection

