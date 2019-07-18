@extends('admin.layout.master')
@section('title','تفاصيل المقترح')


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

            <h4 class="page-title">تفاصيل المقترح: </h4>
        </div>
    </div><!--End Page-Title -->


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h3 class="header-title m-t-0 m-b-30">بيانات المقترح</h3>
                {{--<button onclick="window.print();"  class="no-print btn btn-custom dropdown-toggle waves-effect waves-light">--}}
                {{--طباعة تقرير كامل--}}
                {{--<span class="m-l-5"><i class="fa fa-print"></i></span>--}}
                {{--</button>--}}
                <div class="row">
                    <div class="col-sm-12">


                        <div class="col-md-4">
                            <h4>الإسم بالعربية:</h4>
                            <h5 style="font-weight: 600;">{{$proposal->ar_name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>الإسم بالإنجليزية:</h4>
                            <h5 style="font-weight: 600;">{{$proposal->en_name}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4>عدد اعجبني</h4>
                            <h5 style="font-weight: 600;">{{$proposal->likes->count()}}</h5>
                        </div>


                        <div class="col-md-4">
                            <h4>عدد لم يعجبني</h4>
                            <h5 style="font-weight: 600;">{{$proposal->dislikes->count()}}</h5>
                        </div>

                        <div class="col-md-4">
                            <h4></h4>
                            <h5 style="font-weight: 600;"></h5>
                        </div>

                        <div class="col-md-4">
                            <h4>صورة المقترح</h4>
                            <div  style="width: 200px; height: 150px;">

                                    <a href="{{getimg($proposal->image)}}" class="image-popup" title="Screenshot-1">
                                        <img width="200" height="150" src="{{getimg($proposal->image)}}" class="thumb-img" alt="work-thumbnail">
                                    </a>

                            </div>
                        </div>

                    </div>

                    <h4 class="header-title m-t-0 m-b-30">التعليقات على المقترح</h4>


                    <table class="table table-striped m-0">
                        <thead>
                        <tr>
                            <th style="width: 300px;">إسم المتسخدم</th>
                            <th>التعليق</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($proposal->comments->reverse() as $comment)
                        <tr>
                            <td>{{$comment->user->name}}</td>
                            <td>{{$comment->comment}}</td>
                        </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>

                </div> <!--End of row-->

            </div>
        </div>
    </div>
@endsection
