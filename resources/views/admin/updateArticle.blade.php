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
                                <a style="font-size: 12px" href="" class="btn btn-primary"><i class="fas fa-pen"></i> Add Post</a>
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
                            <form action="{{ route('updateArticle') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" value="{{ $post->id }}" name="id">
                                <div class="form-group">
                                    <label>Judul</label>
                                    @php
                                        $judul = str_replace('-', ' ', $post->judul);
                                    @endphp
                                    <input type="text" name="judul" class="form-control col-md-8" value="{{ $judul }}">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option value="{{ $post->category_id}}">{{ $post->category->nama}}</option>
                                        @foreach ($category as $c)
                                            @if ($c->id != $post->category_id)
                                                <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                            @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Header Image</label><br>
                                    <input type="file" name="image">
                                </div>
                                <div class="form-control">
                                    <textarea name="isi" class="form-control" rows="5" cols="3">{{$post->isi}}</textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <select name="status" class="form-control col-md-4">
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group text-right">
                                    <input type="submit" class="btn btn-success" value="Publish">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
