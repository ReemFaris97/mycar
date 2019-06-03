@extends('admin.layout.master')
@section('title',"عروض اسعار مرفوضة")
@section('styles')
    <style>
        .btn-group, .btn-group-vertical{
            top: 31px;
        }
    </style>
@endsection
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

            <h4 class="page-title">تقارير عروض اسعار مرفوضة لمورد معين</h4>
        </div>
    </div><!--End Page-Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="header-title m-t-0 m-b-30">الفلترة</h4>

                {{-- Search form --}}
                <form  action="" method="get" class="form-inline" role="form">
                    {{--{{csrf_field()}}--}}


                    <div class="form-group">
                        <div class="input-group" >
                            <label for="supplier_id" class=" control-label">إختار المورد</label>
                            <select id="supplier_id" class="form-control" name="supplier_id">
                                <option value="">إختار المورد</option>
                                {{--@foreach($technicals as $technical)--}}
                                {{--<option value="{{$technical->id}}" @if(request('technical_id') == $technical->id) selected @endif >{{$technical->name}}</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group">
                            <label class=" control-label">من</label>
                            <input name="from" type="text" class="form-control" value="{{request('from')}}" placeholder="mm/dd/yyyy" id="datepicker1" autocomplete="off">
                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <label class=" control-label">إلى</label>
                            <input name="to" type="text" class="form-control" value="{{request('to')}}" placeholder="mm/dd/yyyy" id="datepicker2" autocomplete="off">
                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>

                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<div class="input-group">--}}
                            {{--<label class=" control-label">إختار نوع الدفع</label>--}}
                            {{--<select class="form-control" name="supplier_id">--}}
                                {{--<option value="" selected>الكل</option>--}}
                                {{--<option value="">كاش</option>--}}
                                {{--<option value="">إلكتروني</option>--}}
                                {{--<option value="">شبكة</option>--}}
                                {{--@foreach($technicals as $technical)--}}
                                {{--<option value="{{$technical->id}}" @if(request('technical_id') == $technical->id) selected @endif >{{$technical->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    <button type="submit"
                            class="btn btn-success waves-effect waves-light m-l-10 btn-md">بحث</button>

                </form>




                <table id="datatable-responsivex" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 20px;">رقم الطلب</th>
                        <th style="width: 160px;">تاريخ الطلب</th>
                        <th>نوع الدفع</th>
                        <th>قيمة الطلب</th>
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

