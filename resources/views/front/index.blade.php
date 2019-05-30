@extends('front.parts.header')

@section('content')

@foreach ($post as $p)
@php
    $judul = str_replace('-', ' ', $p->judul);
@endphp

<style>
    .per{
        border-bottom: 1px solid #e6e6e6;
        padding-bottom: 100px;
        margin-top: 100px;
    }
</style>
<div class="row per">
    <div class="col-md-8 offset-md-2">
        <div class="wrapper">
            <h1>{{ $judul }}</h1>
            <span style="font-size: 20px; color: #b3b3b3"><i>{{ $p->created_at->toDateString() }} - {{ $p->category->nama }}</i></span>
            <img src="/images/post/{{ $p->header_image }}" width="100%" style="margin-top: 60px; margin-bottom: 30px">
            <p style="font-size:18px;">{{ str_limit($p->isi, 500) }}</p>
                <a href="{{ route('viewEach', $p->judul) }}" class="btn btn-dark btn-sm">Read More</a>
            
            
        </div>
    </div>
</div>

@endforeach

<div class="row justify-content-center" style="margin-top:20px;">
    <div class="col-md-1 col-3">
        {{ $post->links() }}
    </div>
</div>
@endsection