@extends('admin.layout.master')
@section('title')
    محادثة مع العضو  {{$channel->user->name}}
@endsection

{{--@section('header')--}}
{{--    @php--}}
{{--        $channel_id = $channel->id;--}}
{{--        $channel_id = json_encode(['channel_id'=>$channel_id,'user'=>auth()->user()]);--}}
{{--    @endphp--}}
{{--@endsection--}}

@section('content')



    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

    <!-- Content area -->
    <div class="content" id="app">
        <!-- Inverse colors -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">محادثة مع العضو  {{$channel->user->name}}
                </h6>
<!--
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
-->
            </div>
            <div class="chat-panel">

                <div class="chats" id="chats">
                    <div class="chat1 recieve">
                        <div class="chat-img">
                            <img src="{{asset('webssite/img/1.png')}}">
                        </div>
                        <div class="chat-body">
                            <p>
                                مرحبا بك، كيف أساعدك ياقمر ؟
                            </p>
                        </div>
                    </div>

                    <div class="chat1 send">
                        <div class="chat-img">
                            <img src="{{asset('webssite/img/1.png')}}">
                        </div>
                        <div class="chat-body">
                            <p>
                                شكرا يا بيه أنا مبشحتش على فكرة والله و شكرا شكرا اوى لحد كده شكرا عاوزة اكتب كلام كتير و انزل سطر عشان كده برغى الحقيقة
                            </p>
                        </div>
                    </div>



                </div>

                <form class="chatting" id="my_form">
                    <textarea rows="4" cols="95" id="inbox" class="form-control input-lg" data-fv-field="inbox" placeholder="اكتب رسالتك..."></textarea>
                    <button type="button" id="sendnow"> <i class="fas fa-arrow-right"></i> </button>
                </form>

            </div>
        </div>
        <!-- /inverse colors -->

    </div>
    <!-- /content area -->

            </div>
        </div>
    </div>



@endsection
@section('scripts')



@endsection
