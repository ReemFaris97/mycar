@extends('admin.layout.master')
@section('title')
    محادثة مع العضو  {{$channel->user->phone}}
@endsection

{{--@section('header')--}}
{{--    @php--}}
{{--        $channel_id = $channel->id;--}}
{{--        $channel_id = json_encode(['channel_id'=>$channel_id,'user'=>auth()->user()]);--}}
{{--    @endphp--}}
{{--@endsection--}}


@section('styles')
<style>
    .chat-panel {
    position: relative;
    padding: 15px 15px 100px 15px;
}
    .chats{
    margin: 40px 0;
    height: calc(100% - 137px);
    overflow-y: auto;
    padding: 15px
}
.chat1{
    width: 100%;
    display: inline-block;
    margin: 0 0 15px 0;
    position: relative;
}
.chat1 .chat-img{
    width: 43px;
    height: 43px;
    border-radius: 50%;
    overflow: hidden;
    position: absolute;
    bottom: 0;
}
.chat1 .chat-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.chat-body{
    padding: 10px;
    color: #fff;
    max-width: calc(100% - 48px);
    min-width: 50%;
}
.chat-body p{
    margin: 0;
    text-align: right;
    overflow-wrap: break-word;
}
/*** Recieve chat ***/
.recieve{
    padding: 0 0 0 48px;
}
.recieve .chat-img{
    border: 1px solid #FF5E0E;
    float: left;
    left: 0;
}
.recieve .chat-body{
    float: left;
    border-radius: 10px 10px 10px 0;
    background-color: #FF5E0E;
    margin: 0 0 0 5px;
}
/*** Send chat ***/
.send{
    padding: 0 48px 0 0;
}
.send .chat-img{
    float: right;
    right: 0;
    border: 1px solid #868686;
}
.send .chat-body{
    float: right;
    border-radius: 10px 10px 0 10px;
    background-color: #868686;
    margin: 0 5px 0 0;
}
/***************** Form Chat ************/
.chatting{
    position: absolute;
    bottom: 10px;
    width: 100%;
    right: 0;
    left: 0;
    margin: 0 auto;
    border-top: 1px solid #eee;
    padding: 10px 5px;
}
.chatting .form-control{
    float: left;
    width: calc(100% - 40px) !important;
}
.chatting .form-control:hover , .chatting .form-control:focus{
    background-color: #d2d2d2;
}
.chatting .form-control:focus{
    border: 1px solid #ff5e0e;
}
.chatting button{
    float: right;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: #ff5e0e;
}
.chatting button:hover , .chatting button:focus{
    opacity: .7;
}
</style>
@endsection


@section('content')



    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

    <!-- Content area -->
    <div class="content" id="app">
        <!-- Inverse colors -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">محادثة مع العضو  {{$channel->user->phone}}
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
                <div class="chats" id="chats" style=" height: 250px;overflow-x: hidden; overflow-y: auto; " >
                    @foreach($channel->messages as $message)
                        @if($message->user_id != auth()->id())
                    <div class="chat1 recieve">
                        <div class="chat-img">
                            <img src="{{getimg($message->user->image)}}">
                        </div>
                        <div class="chat-body">
                            <p>
                                {{$message->body}}
                            </p>
                        </div>
                    </div>
                        @else
                    <div class="chat1 send">
                        <div class="chat-img">
                            <img src="{{getimg($message->user->image)}}">
                        </div>
                        <div class="chat-body">
                            <p>
                                {{$message->body}}
                            </p>
                        </div>
                    </div>
                        @endif
                     @endforeach
                </div>

                <form data-parsley-validate novalidate class="chatting" id="messageForm" method="post" action="{{route('message.store',$channel->id)}}" >
                    <textarea name="body" required rows="4" cols="95" id="inbox" class="form-control input-lg" data-fv-field="inbox" placeholder="اكتب رسالتك..."></textarea>
{{--                    <button type="submit" id="sendnow"> <i class="fas fa-arrow-right"></i> </button>--}}
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>



<script>
     ////////////// chat modal/////////////////////////////////////////////////////////////////////////////////////////
    $('#seven').click(function () {
        //////////////////// textarea focus //////////////////////////////////////
        $('#inbox').focus();
        var buttonId = $(this).attr('id');
        $('#modal-container').removeAttr('class').addClass(buttonId);
        $('body').addClass('modal-active');
        $('#chats').scrollTop($('#chats')[0].scrollHeight);
    });

    $('.closeit').click(function () {
        $('#modal-container').addClass('out');
        $('body').removeClass('modal-active');
    });


    ///////////////////// enter submit /////////////
    $('#inbox').keydown(function () {
        $('#chats').scrollTop($('#chats')[0].scrollHeight);

        var message = $("textarea").val();

        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }
        if (event.keyCode == 13) {
            if (isEmptyOrSpaces(message)) {
                alert("Enter Some Text In Textarea");
            } else {
                      var form = $('#messageForm');


                        $.ajax({
                            type: 'POST',
                            url: form.attr('action'),
                            data: {body:message},
                            // cache: false,
                            // contentType: false,
                            // processData: false,
                            success: function (data) {

                                if (data.status === true) {

                                    var title = data.title;
                                    var msg = data.message;
                                    toastr.options = {
                                        positionClass : 'toast-top-left',
                                        onclick:null
                                    };
                                    // var $toast = toastr['success'](msg,title);
                                    // $toastlast = $toast;
                                    $('#messageForm').each(function () {
                                        this.reset();
                                    });

                                    var msgSend = $(".chat1.send").val();
                                    $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="img/1.png"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');
                                    $("textarea").val('');
                                    $('#chats').scrollTop($('#chats')[0].scrollHeight);
                                    return false;
                                    $('#inbox').focus();

                                } else {
                                    var title = data.title;
                                    var msg = data.message;
                                    toastr.options = {
                                        positionClass : 'toast-top-left',
                                        onclick:null
                                    };
                                    var $toast = toastr['error'](msg,title);
                                    $toastlast = $toast;

                                }
                            },
                            error: function (data) {

                            }
                        });













                // var msgSend = $(".chat1.send").val();
                // $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="img/1.png"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');
                // //      $(".newmsg").text();
                // //      $('#my_form').submit();
                // //      alert("Your message is sent succesfully:- " );
            }
            // $("textarea").val('');
            // $('#chats').scrollTop($('#chats')[0].scrollHeight);
            // return false;
            // $('#inbox').focus();

        }
    });

    $('#sendnow').click(function () {
        $('#inbox').focus();
        var message = $("textarea").val();

        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }
        if (isEmptyOrSpaces(message)) {
            alert("Enter Some Text In Textarea");

        } else {

            var msgSend = $(".chat1.send").val();
            $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="img/1.png"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');
            //                $(".newmsg").text();

            //                $('#my_form').submit();
            //                alert("Your message is sent succesfully:- " );
        }
        $("textarea").val('');

        //                var len = $('#chats').height();
        //                console.log(len);
        //               $('#chats').scrollTop(len * 1000);

        $('#chats').scrollTop($('#chats')[0].scrollHeight);

        return false;
    });
</script>


@endsection
