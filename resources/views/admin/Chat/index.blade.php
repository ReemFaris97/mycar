@extends('admin.layout.master')
@section('title')
صندوق محادثات الأعضاء
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">

                <!-- Single line -->
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h6 class="panel-title text-center">صندوق محادثات الاعضاء</h6>

                        <div class="heading-elements not-collapsible">
                            <span class="label bg-blue heading-text"> لديك {{\App\Message::count()}} رساله في الصندوق </span>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-inbox">
                            <tbody data-link="row" class="rowlink">
                            @php
                            $i=1;
                            @endphp
                            @foreach($channels as $channel)
                            <tr class="unread">
                                <td class="table-inbox-checkbox rowlink-skip">
                                    {{$i++}}
                                </td>


                                <td class="table-inbox-image" style="width: 8%">
													<img src="{{getimg($channel->user->image)}}" style="width: 40px">
                                </td>
                                <td class="table-inbox-name">
                                    <a href="#">
                                        <div class="letter-icon-title text-default">{{$channel->user->name}}</div>
                                    </a>
                                </td>
                                <td class="table-inbox" style="width: 10%">
                                    <span class="label bg-success">{{(is_null($channel->ad_id))?'هدية':'اعلان'}}</span>
                                </td>
                                <td class="table-inbox-message" style="width: 30%;">
                                    <span class="table-inbox-preview">{{$channel->lastMessage()['body']}}</span>
                                </td>
                                <td class="table-inbox" style="width: 20%">
                                    {{$channel->lastMessage()['created_at']}}
                                </td>

                                <td class="table-inbox" style="width: 10%">
                                    <a href="{{route('admin.chat.show',['id'=>$channel->id])}}" data-toggle="tooltip" data-original-title="عرض"> <i class="icon-bubbles3 text-inverse" style="margin-left: 10px"></i> </a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /single line -->


            </div>
        </div>
        <!-- /detached content -->


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /content area -->


@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/public/assets/js/pages/mail_list.js')}}"></script>


@endsection
