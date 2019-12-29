<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>@lang('suppliers.no')</th>
        <th>@lang('suppliers.order_owner')</th>
        <th>@lang('suppliers.phone')</th>
        <th>@lang('suppliers.parts_count')</th>
        <th>@lang('suppliers.order_status')</th>
        <th style="width: 250px;" >@lang('suppliers.options')</th>
    </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @foreach($orders as $order)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$order->user->name ==""?"-----":$order->user->name}}</td>
            <td>{{$order->user->phone}}</td>
            <td>{{$order->order_details->count()}}</td>
            <td>
                @if($order->status != 'new' && $order->supplier_id != auth()->id())

                    <label class="label label-danger">@lang('suppliers.refused')</label>
                @else

                    @if($order->status == 'new')
                        <label class="label label-success">@lang('suppliers.new')</label>
                    @endif

                    @if($order->status == 'waiting')
                        @if($order->hasAnyReplyByAuthSupplier())
                            <label class="label label-primary">@lang('suppliers.waiting_orders')</label>
                        @else
                            <label class="label label-success">@lang('suppliers.new')</label>
                        @endif
                    @endif

                    @if($order->status == 'received')
                        <label class="label label-success">@lang('suppliers.confirmed_orders')</label>
                    @endif

                    @if($order->status == 'finished')
                        @if($order->hasRefusedReplyByAuthSupplier())
                            <label class="label label-danger">@lang('suppliers.refused')</label>
                        @else
                            <label class="label label-purple">@lang('suppliers.finished')</label>
                        @endif
                    @endif

                @endif

            </td>

            <td>
                <a href="{{route('supplier.orders.show',$order->id)}}" class="btn btn-primary waves-effect waves-light btn-sm m-b-5">@lang('orders.details')</a>
                {{--<a href="{{route('orders.edit',$row->id)}}" class="label label-warning">تعديل</a>--}}

                {{--@if(auth()->id() != $row->id)--}}
                {{--@if($row->is_active == 1)--}}
                {{--<a id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-action="suspend" data-url="{{route('users.suspendOrActivate')}}" class="statusWithReason label label-danger">حظر</a>--}}
                {{--@else--}}
                {{--<a id="elementRow{{$row->id}}" href="javascript:;" data-id="{{$row->id}}" data-action="activate" data-url="{{route('users.suspendOrActivate')}}" class="statusWithReason label label-success">تفعيل</a>--}}
                {{--@endif--}}

                {{--<a  id="elementRow{{$order->id}}" href="javascript:;" data-id="{{$order->id}}" data-url="{{route('orders.destroy',$order->id)}}" class="removeElement btn btn-danger waves-effect waves-light btn-sm m-b-5">حذف</a>--}}

                {{--@endif--}}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
