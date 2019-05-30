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
                                <h4>Comments</h4>
                            </div>
                            <div class="float-right">
                                <a style="font-size: 12px" href="" class="btn btn-primary" data-toggle="modal" data-target="#replyComment"><i class="fas fa-reply-all"></i> Reply</a>
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
                                           <th>Nama</th>
                                           <th>Email</th>
                                           <th>Pada Artikel</th>
                                           <th>Komentar</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       
                                       @foreach ($comment as $c)
                                                @php
                                                   $judul = str_replace('-', ' ', $c->article->judul);
                                                @endphp
                                           <tr>
                                               <td>{{ $c->id }}</td>
                                               <td>{{ $c->nama }}</td>
                                               <td>{{ $c->email }}</td>
                                               <td>{{ $judul }}</td>
                                               <td>{{ $c->komentar }}</td>
                                               <td>
                                               <a href="{{ route('deleteComment', $c->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                               </td>
                                           </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                               
                           </div>
                           <br>
                               {{ $comment->links() }}
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
    </div>
</div>

<div class="modal" id="replyComment">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('replyComment')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" readonly value="Admin">
                    <input type="hidden" name="email" value="admin@mail.com">
                </div>
                <div class="form-group">
                    <label>Pada article : </label>
                    <select name="articleId" class="form-control custom-select">
                        @foreach ($post as $p)
                        @php
                            $judul = str_replace('-', ' ', $p->judul);
                        @endphp
                          <option value="{{ $p->id }}">{{ $judul }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Komentar</label>
                    <textarea name="komentar" class="form-control"></textarea>
                </div>
        </div>
            
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" value="Create">
            </form>
        </div>
  
      </div>
    </div>
  </div>
@endsection
