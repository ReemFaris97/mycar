@extends('website.layouts.master')

@section('styles')

@endsection

@section('content')
    <section class="done all-sections">
        <div class="container">

            <span> <i class="fas fa-check-circle"></i> </span>
            <p>
                @lang('web.payment_done')
            </p>

            <p><h4>
                <a href="{{route('web.order.getDetails',$order->id)}}">@lang('web.goto_order_details')</a>
            </h4></p>
        </div>
    </section>

@endsection

@section('scripts')

@endsection
