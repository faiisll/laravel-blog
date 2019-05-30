@extends('front.parts.header')

@section('content')

<style>
    .per{
        border-bottom: 1px solid #e6e6e6;
        padding-bottom: 100px;
        margin-top: 100px;
    }
</style>

@php
    $judul = str_replace('-', ' ', $post->judul);
@endphp
<div class="row per">
    <div class="col-md-8 offset-md-2">
        <div class="wrapper">
            <h1>{{ $judul }}</h1>
            <span style="font-size: 20px; color: #b3b3b3"><i>{{ $post->created_at->toDateString() }} - {{ $post->category->nama }}</i></span>
            <img src="/images/post/{{ $post->header_image }}" width="100%" style="margin-top: 60px; margin-bottom: 30px">
            <p style="font-size:18px;">{!! nl2br(e($post->isi)) !!}</p>
            
        </div>
    </div>
</div>
<div class="row" style="margin-top:50px">
    <div class="col-md-8 offset-md-2">
        <h3>Your respond :</h3>
        <br>

        <form action="{{ route('commentArticle')}}" method="POST">
            @csrf
            <input type="hidden" value="{{ $post->id }}" name="id">
            <div class="form-group">
                <label>Nama :</label>
                <input type="text" class="form-control col-md-6" name="nama">
            </div>
            <div class="form-group">
                <label>Email :</label>
                <input type="email" class="form-control col-md-6" name="email">
            </div>
            <div class="form-group">
                <label>Komentar :</label>
                <textarea class="form-control" rows="8" name="komentar"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-dark btn-sm" value="Comment">
            </div>
        </form>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-md-8 offset-md-2">
        @if ($comment == null)
        <div style="margin-top:50px; border-bottom: 1px solid #e6e6e6; padding-bottom: 20px">
            <p style="font-size:14px">No comment yet</p>
        </div>
        @endif
        <h4 class="text-center">Comments</h4>
        @foreach ($comment as $c)
        <div style="margin-top:50px; border-bottom: 1px solid #e6e6e6; padding-bottom: 20px">
            
            <br>
            <h5>{{ $c->nama }}</h5>
            <p style="font-size:14px">{{ $c->komentar }}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection