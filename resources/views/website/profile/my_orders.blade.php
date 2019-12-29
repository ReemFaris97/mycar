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

    <style>

        table.dataTable{
            width: 100% !important;
        }
    </style>
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
                        <div class="tab-content">

                            <div id="menu2" class="big-child">
                                <h3 class="h3-after">@lang('web.my_orders')
                                    <!--
                                                                        <span class="span1"></span>
                                                                        <span class="span2"></span>
                                    -->
                                </h3>
                                <ul class="nav nav-tabs child-tabs">
                                    <li class="active"><a data-toggle="tab" href="#new">@lang('web.new')</a></li>
                                    <li ><a data-toggle="tab" href="#waiting">@lang('web.wait')</a></li>
                                    <li><a data-toggle="tab" href="#finshed">@lang('web.finished')</a></li>
                                    <!------- show   this in  user -------> <li><a data-toggle="tab" href="#menu3">@lang('web.backs')</a></li>
                                </ul>

                                <div class="tab-content">

                                    <div id="new" class="tab-pane fade in active">
                                        <table class="mytable">
                                            <thead>
                                            <tr>
                                                <th>@lang('web.factory_company')</th>
                                                <th>@lang('web.order_no')</th>
                                                <th>@lang('web.date')</th>
{{--                                                <th>عداد الوقت</th>--}}
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($new_orders as $row)
                                            <tr>
                                                <td>{{$row->company->name()}}</td>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->created_at}}</td>
{{--                                                <td class="font-s">00:26:48</td>--}}
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}">@lang('web.details')</a>
                                                </td>
                                            </tr>
                                            @empty

                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="waiting" class="tab-pane fade ">
{{--                                        <!------- show   this in  user -------}}

                                        <table class="mytable">
                                            <thead>
                                                <tr>
                                                    <th>@lang('web.factory_company')</th>
                                                    <th>@lang('web.order_no')</th>
                                                    <th>@lang('web.date')</th>
                                                    <th>@lang('web.value')</th>
                                                    <th>@lang('web.status')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($waiting_orders as $row)
                                                <tr>
                                                    <td>{{$row->company->name()}}</td>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->created_at->toDateString()}}</td>
                                                    <td>{{$row->total}}</td>
                                                    <td>

{{--                                                        @if(in_array($row->status,['waiting', 'accepted','prepare','onWay']))--}}
{{--                                                            قيد الإنتظار--}}
{{--                                                        @endif--}}
                                                        @switch($row->status)
                                                            @case('waiting') @lang('web.wait') @break
                                                            @case('accepted') @lang('web.processing') @break
                                                            @case('prepare') @lang('web.on_working') @break
                                                            @case('onWay') @lang('web.delivery_receive')@break
                                                        @endswitch

                                                    </td>
                                                    <td>
                                                        <a href="{{route('web.order.getDetails',$row->id)}}"> @lang('web.details')</a>
                                                    </td>
                                                </tr>
                                             @empty

                                            @endforelse
                                            </tbody>
                                        </table>
{{--                                        -->--}}

                                    </div>
                                    <div id="finshed" class="tab-pane fade">
{{--                                        <!------- show   this in  user -------}}
                                         <table class="mytable">
                                           <thead>
                                               <tr>
                                                   <th>@lang('web.factory_company')</th>
                                                   <th>@lang('web.order_no')</th>
                                                   <th>@lang('web.date')</th>
                                                   <th>@lang('web.value')</th>
                                                   <th>@lang('web.status')</th>

                                                   <th></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                           @forelse($finished_orders as $row)
                                               <tr>
                                                   <td>{{$row->company->name()}}</td>
                                                   <td>{{$row->id}}</td>
                                                   <td>{{$row->created_at}}</td>
                                                   <td>{{$row->total}}</td>
                                                   <td>
                                                       @switch($row->status)
                                                           @case('refused')  @lang('web.refused') @break
                                                           @case('delivered') @lang('web.delivered')@break
                                                           @case('completed')@lang('web.completed')@break
                                                       @endswitch
                                                   </td>

                                                   <td>
                                                       <a href="{{route('web.order.getDetails',$row->id)}}"> @lang('web.details')</a>
                                                   </td>
                                               </tr>
                                               @empty

                                               @endforelse
                                           </tbody>
                                       </table>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <table class="mytable">
                                            <thead>
                                            <tr>
                                                <th>@lang('web.order_no') </th>
                                                <th>@lang('web.order_no')</th>
                                                <th>@lang('web.date')</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>تويوتا 2019</td>
                                                <td>000002558</td>
                                                <td>25/4/2019</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}"> تفاصيل</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تويوتا 2019</td>
                                                <td>000002558</td>
                                                <td>25/4/2019</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}"> تفاصيل</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تويوتا 2019</td>
                                                <td>000002558</td>
                                                <td>25/4/2019</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}"> تفاصيل</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تويوتا 2019</td>
                                                <td>000002558</td>
                                                <td>25/4/2019</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}"> تفاصيل</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تويوتا 2019</td>
                                                <td>000002558</td>
                                                <td>25/4/2019</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}"> تفاصيل</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تويوتا 2019</td>
                                                <td>000002558</td>
                                                <td>25/4/2019</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}"> تفاصيل</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تويوتا 2019</td>
                                                <td>000002558</td>
                                                <td>25/4/2019</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('web.order.getDetails',$row->id)}}"> تفاصيل</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


@section('scripts')
    <script src="{{asset('website/js/jquery-1.11.1.min.js')}}"></script>
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


    <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/js/all.min.js')}}"></script>
    <script src="{{asset('website/js/wow.min.js')}}"></script>
    <script>
        new WOW().init();

    </script>
    <!-- -->
    {{--<script src="{{asset('website/js/script.js')}}"></script>--}}



@endsection
