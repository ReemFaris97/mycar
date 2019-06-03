<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="">

            <a href="{{route('homePage')}}" class="logo-wrapper">

                {{--<img src="{{asset('admin/assets/images/logo2.png')}}" alt="شعار المشروع">--}}
            </a>
        </div>
        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                @php $image = auth()->user()->image; @endphp
                @if($image != null or $image != "")
                    <img src="{{getimg($image)}}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                    @else
                    <img src="{{asset('admin/assets/images/noimage.png')}}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                    @endif

                {{--<div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>--}}
            </div>
            <h5 style="margin-top: 40px;"><a href="#">{{auth()->user()->name}}</a> </h5>
            <ul class="list-inline">
                <li>
                    {{--{{route('user.get.profile')}}--}}
                    <a href="" >
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
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">القائمة</li>


                    <li><a href="{{route('homePage')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>الرئيسية</span></a></li>
                    <li><a href="{{route('roles.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>الصلاحيات و الأدوار</span></a></li>
                    <li><a href="{{route('admins.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>أعضاء الإدارة</span></a></li>
                    <li><a href="{{route('cities.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>المدن</span></a></li>
                    <li><a href="{{route('companies.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>الشركات المصنعة</span></a></li>
                    <li><a href="{{route('models.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>الموديلات</span></a></li>
                    <li><a href="{{route('parts.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>القطع و المنتجات</span></a></li>
                    <li><a href="{{route('users.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>إدارة المستخدمين</span></a></li>
                    <li><a href="{{route('suppliers.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>إدارة الموردين</span></a></li>
                    <li><a href="{{route('orders.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>طلبات العملاء</span></a></li>
                <li><a href="{{request()->root()}}/dashboard/settings/general" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>الإعدادات</span></a></li>
                <li><a href="{{route('instructions.index')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>الإرشادات</span></a></li>
                <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-check-circle"></i><span>التقارير</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('report.supplier.sales')}}?type=initial">تقرير مبيعات مورد</a></li>
                            <li><a href="{{route('report.supplier.refused')}}">تقرير عروض اسعار مرفوضة من مورد</a></li>
                            <li><a href="{{route('report.customer.orders')}}">تقرير طلبات عميل</a></li>
                        </ul>
                    </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
