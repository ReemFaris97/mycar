<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="">
            {{--{{route('homePage')}}--}}
            <a href="" class="logo-wrapper">

                {{--<img src="{{asset('supplier/assets/images/logo2.png')}}" alt="شعار المشروع">--}}
            </a>
        </div>
        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                {{--@php $image = auth()->user()->image; @endphp--}}
                @if(auth()->user()->image != null or auth()->user()->image != "")
                    <img src="{{getimg(auth()->user()->image)}}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                    @else
                    <img src="{{asset('supplier/assets/images/noimage.png')}}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                    @endif

                {{--<div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>--}}
            </div>
            {{--{{auth()->user()->name}}--}}
            <h5 style="margin-top: 40px;"><a href="#"></a> </h5>
            <ul class="list-inline">
                <li>
                    {{--{{route('user.get.profile')}}--}}
                    <a href="{{route('profile.getEditForm')}}" >
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="#" class="text-custom" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <form id="logout-form" action="{{ route('supplier.logout') }}" method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">@lang('suppliers.menu')</li>


                    <li><a href="{{route('supplier.home')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>@lang('suppliers.menu')</span></a></li>


                <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-check-circle"></i><span>@lang('suppliers.orders')</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('supplier.orders.new')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>@lang('suppliers.new_orders')</span></a></li>
                            <li><a href="{{route('supplier.orders.waiting')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>@lang('suppliers.waiting_orders')</span></a></li>
                            <li><a href="{{route('supplier.orders.received')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>@lang('suppliers.current_orders')</span></a></li>
                            <li><a href="{{route('supplier.orders.finished')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>@lang('suppliers.finished_orders')</span></a></li>
                        </ul>
                    </li>
                <li><a href="{{route('supplier.financial.dues')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>@lang('suppliers.financial_dues')</span></a></li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
