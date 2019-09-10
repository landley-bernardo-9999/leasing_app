@extends('layouts.app')
@section('title', 'Results...')
@section('content')
<div class="container">
        <p class="text-left">{{ $rooms->count() }} rooms found.</p>  
    {{-- {{ $rooms->links() }} --}}
 @foreach ($rooms as $item)
    <div class="jumbotron">
        <h1 class="display-6">{{ $item->room_no }} {{ $item->room_wing }}</h1>
        <p class="lead">{{ $item->building }}</p>
        <p class="lead">{{ $item->type_of_bed }}</p>
        <hr class="my-4">
        <p>Rate: LT ({{ number_format($item->long_term_rent,2) }}), ST ({{ number_format($item->short_term_rent,2) }}), Transient ({{ number_format($item->transient_rent,2) }})</p>
        @if($item->room_status === 'OCCUPIED')
            <p class="text-danger">{{ $item->room_status }}</p>
        @else
            <a class="btn btn-primary" href="/rooms/{{ $item->room_id }}" role="button"><i class="fas fa-arrow-right"></i> Book</a>
        @endif
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
