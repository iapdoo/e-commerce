@extends('style.index')
@section('content')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                {!! setting()->massage_maintenance !!}
            </div>
        </div>
    </div>

    @endsection