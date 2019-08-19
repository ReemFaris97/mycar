@extends('website.layouts.master')

@section('styles')
    <!-- This for here -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
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

                <div class="col-md-10 col-sm-8 col-xs-12">
                    <div class="left-tab">
                        <div class="tab-content">

                            <div class="notifiction">
                                <h3 class="h3-after">@lang('web.notifications')
                                    <!--
                                    <span class="span1"></span>
                                    <span class="span2"></span>
                                    -->
                                </h3>


                                @forelse($notifications as $notify)
                                    <div class="notice" id="NotifyDiv{{$notify->id}}">
                                        <button data-id="{{$notify->id}}" data-url="{{route('web.delete.notification')}}" type="button" class="close">×</button>
                                        <img src="{{asset('website/img/bell.svg')}}">
                                        <h4>{{$notify->title()}}</h4>
                                        <a href="#">{{$notify->message()}}</a>
                                    </div>
                                    @empty
                                    <div class="notice back-gr">
                                        <button type="button" class="close">&times;</button>
                                        <img src="{{asset('website/img/bell.svg')}}">
                                        <a href="#">@lang('web.no_notify')</a>
                                    </div>
                                @endforelse

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
    <script>
        $(document).ready(function(){
            $(".close").on('click' , function(){
                var id = $(this).data('id');
                var url = $(this).data('url');

                $.ajax({
                    type:'post',
                    url :url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        if(data.status == true){
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };

                            var $toast = toastr['success'](msg,title);
                            $toastlast = $toast;

                            $('#NotifyDiv'+id).remove();

                        }else {
                            var title = data.title;
                            var msg = data.message;
                            toastr.options = {
                                positionClass : 'toast-top-left',
                                onclick:null
                            };

                            var $toast = toastr['error'](msg,title);
                            $toastlast = $toast
                        }
                    }
                });

            })
        })

    </script>

@endsection
