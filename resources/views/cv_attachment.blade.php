@extends('layouts/frontend_app')

@section('frontend_content')
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <iframe height="1400" width="1600" src="{{ asset('storage/cv_attachment') }}/{{ $data->cv_attachment }}" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
@section('footer_scripts')
@endsection
