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
                                <h4>Dashboard</h4>
                            </div>
                            <div class="float-right tl">
                                <a style="font-size: 12px" href="{{ route('createArticle')}}" class="btn btn-primary"><i class="fas fa-pen"></i> Add Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-8" style="background-color:#e5e9f2; margin-top: 40px; height: 2px; opacity:0.5">
                        </div>
                    </div>
                    <div class="row justify-content-center text-center">
                        <div class="col-md-3 col-11 sh">
                            <div class="isi">
                                <h5>Posts</h5>
                                <p>
                                    {{$post->count()}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-11 sh">
                            <div class="isi">
                            <h5>Comments</h5>
                            <p>
                                {{$comment->count()}}
                            </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-11 sh">
                            <div class="isi">
                            <h5>Categories</h5>
                            <p>{{$category->count()}}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
