<div class="col-md-2 col-sm-4 col-xs-12 right-tab">
    <ul class="nav nav-tabs contan-tabs">
        <li class="active"><a  href="{{route('web.profile')}}"><i class="fas fa-user"></i> معلومات الحساب </a></li>
        {{--                        <!------- show   this in  user ------->   <li><a  href="entitlements.html"><i class="fas fa-file-alt"></i> مستحقاتي</a></li>--}}
        <li><a href="{{route('web.profile.getMyOrders')}}"><i class="fas fa-list"></i> طلباتي</a></li>
        <li><a  href="{{route('web.notifications')}}"><i class="fas fa-bell"></i> الاشعارات</a></li>
        <li><a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج </a></li>
    </ul>
</div>

<form id="logout-form" action="{{ route('web.user.logout') }}" method="POST"
      style="display: none;">
    {{ csrf_field() }}
</form>

