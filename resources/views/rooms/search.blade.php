@extends('layouts.app')
@section('title', 'Search')
@section('content')
<div class="container">
        <p class="text-left">{{ $rooms->count() }} rooms found.</p>  
    {{-- {{ $rooms->links() }} --}}
 @foreach ($rooms as $item)
    <div class="jumbotron">
        <h1 class="display-6">{{ $item->room_no }} {{ $item->room_wing }} ({{ $item->room_status }})</h1>
        <p class="lead">{{ $item->building }}</p>
        <p class="lead">{{ $item->type_of_bed }}</p>
        <hr class="my-4">
        <p>Rate: LT ({{ number_format($item->long_term_rent,2) }}), ST ({{ number_format($item->short_term_rent,2) }}), Transient ({{ number_format($item->transient_rent,2) }})</p>
        <a class="btn btn-primary btn-md" href="/rooms/{{ $item->room_id }}" role="button">Book</a>
    </div>
 @endforeach
</div>
@endsection
<style>
    .jumbotron{
        padding-top:2% !important;
        padding-bottom:2% !important;
    }
    }
</style>
