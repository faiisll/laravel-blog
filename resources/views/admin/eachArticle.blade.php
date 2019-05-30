@extends('layouts.app')

@section('content')
    
<div class="container-fluid" id="bgc">
        
    <div class="row justify-content-center">

        @include('admin.parts.sidebar')

        <div class="col-md-9 col-10">
            <div class="mainn">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="float-left">
                                <h4>Status : <div class="btn btn-success disabled">{{ $post->status}}</div></h4>
                            </div>
                            <div class="float-right tl" style="font-size: 12px">
                                <a href="{{ route('deleteArticle',$post->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-8" style="background-color:#e5e9f2; margin-top: 40px; height: 2px; opacity:0.5">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <br>
                            @php
                                $judul = str_replace('-', ' ', $post->judul);
                            @endphp
                            <h4>{{$judul}} - ({{ $post->category->nama }})</h4>
                            @if ($post->created_at != null)
                                <small class="text-muted">Posted At : {{$post->created_at->toDateString()}} | By: Admin</small>
                            @endif
                            <br>
                            <br>
                            <img src="/images/post/{{ $post->header_image}}" width="100%">
                            <br>
                            <p>
                                <br>
                                {!! nl2br(e($post->isi)) !!}
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
