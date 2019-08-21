@extends('website.layouts.master')

@section('styles')

@endsection

@section('content')
    <section class="done all-sections">
        <div class="container">

            <span> <i class="fas fa-check-circle"></i> </span>
            <p>
                تم الدفع بنجاح
            </p>

            <p><h4>
                <a href="{{route('web.order.getDetails',$order->id)}}">التوجه لتفاصيل الطلب</a>
            </h4></p>
        </div>
    </section>

@endsection

@section('scripts')

@endsection
