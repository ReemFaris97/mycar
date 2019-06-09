<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>م</th>
        <th>اسم مقدم الطلب</th>
        <th>عدد القطع بالطلب</th>
        <th>حالة الطلب</th>
        <th style="width: 250px;" >العمليات المتاحة</th>
    </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @foreach($orders as $order)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$order->user->name}}</td>
            <td>{{$order->order_details->count()}}</td>
            <td>
                @if($order->status == 'new')
                    <label class="label label-success">جديد</label>
                @endif

                @if($order->status == 'waiting')
                    @if($order->hasAnyReplyByAuthSupplier())
                        <label class="label label-primary">قيد الإنتظار</label>
                    @else
                        <label class="label label-success">جديد</label>
                    @endif
                @endif

                    @if($order->status == 'received')
                        <label class="label label-success">طلبات معتمده</label>
                    @endif

                    @if($order->status == 'finished')
                        @if($order->hasRefusedReplyByAuthSupplier())
                            <label class="label label-danger">مرفوض</label>
                        @else
                            <label class="label label-purple">منتهي</label>
                        @endif
                    @endif

            </td>

            <td>
                <a href="{{route('supplier.orders.show',$order->id)}}" class="btn btn-primary waves-effect waves-light btn-sm m-b-5">تفاصيل</a>
                {{--<a href="{{route('orders.edit',$row->id)}}" class="label label-warning">تعديل</a>--}}

                {{--@if(auth()->id() != $row->id)--}}
                {{--@if($row->is_active == 1)--}}
                {{--<a id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-action="suspend" data-url="{{route('users.suspendOrActivate')}}" class="statusWithReason label label-danger">حظر</a>--}}
                {{--@else--}}
                {{--<a id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-action="activate" data-url="{{route('users.suspendOrActivate')}}" class="statusWithReason label label-success">تفعيل</a>--}}
                {{--@endif--}}

                <a  id="elementRow{{$order->id}}" href="javascript:;" data-id="{{$order->id}}" data-url="{{route('orders.destroy',$order->id)}}" class="removeElement btn btn-danger waves-effect waves-light btn-sm m-b-5">حذف</a>

                {{--@endif--}}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
