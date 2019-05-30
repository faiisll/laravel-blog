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
                                <h4>Articles</h4>
                            </div>
                            <div class="float-right">
                                <a style="font-size: 12px" href="{{ route('createArticle')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                                <a style="font-size: 12px" href="{{ route('trash')}}" class="btn btn-danger">Trash</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-8" style="background-color:#e5e9f2; margin-top: 40px; height: 2px; opacity:0.5">
                        </div>
                    </div>
                    <div class="row justify-content-center text-center">
                       <div class="col-md-12">
                           <div class="table-responsive" style="margin-top:20px">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th>ID</th>
                                           <th>Judul</th>
                                           <th>Isi</th>
                                           <th>Category</th>
                                           <th>status</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($post as $p)
                                           <tr>
                                               <td>{{ $p->id }}</td>
                                               @php
                                                   $judul = str_replace('-', ' ', $p->judul);
                                               @endphp
                                               <td>{{ str_limit($judul, 20)}}</td>
                                               <td>{{ str_limit($p->isi, 10) }}</td>
                                               <td>{{ $p->category->nama }}</td>
                                               <td>{{ $p->status }}</td>
                                               <td>
                                                <a href="{{ route('viewEachArticle', $p->judul)}}" class="btn btn-success col-12 col-md-3"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('editArticle', $p->id)}}" class="btn btn-info col-12 col-md-3"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('deleteArticle',$p->id)}}" class="btn btn-danger col-12 col-md-3"><i class="fas fa-trash"></i></a>
                                               </td>
                                           </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                               
                           </div>
                           <br>
                               {{ $post->links() }}
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
