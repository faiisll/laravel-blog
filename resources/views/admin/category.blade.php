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
                                <h4>Category</h4>
                            </div>
                            <div class="float-right">
                                <a style="font-size: 12px" href="" class="btn btn-primary" data-toggle="modal" data-target="#createCategory"><i class="fas fa-plus"></i> Add</a>
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
                                           <th>Deskripsi</th>
                                           <td>Image</td>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($category as $c)
                                           <tr>
                                               <td>{{ $c->id }}</td>
                                               <td>{{ $c->nama }}</td>
                                               <td>{{ $c->deskripsi }}</td>
                                                <td><img src="/images/category/{{ $c->header_image}}" alt="" width="80px"></td>
                                               <td>
                                               <a href="#" class="btn btn-info" data-toggle="modal" data-target="#updateCategory{{ $c->id }}">Edit</a>
                                               <a onclick="return confirm('are u sure ?')" href="{{ route('deleteCategory', $c->id) }}" class="btn btn-danger">Delete</a>
                                               </td>
                                           </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                           <br>
                               {{ $category->links() }}
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="createCategory">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('storeCategory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="desk" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Header</label>
                    <input type="file" name="image" class="form-control">
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

  <!-- The Modal -->

@foreach ($category as $c)
    

<div class="modal" id="updateCategory{{ $c->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Create Category</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('updateCategory', $c->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" value="{{ $c->id }}" name="id">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $c->nama }}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="desk" class="form-control">
                            {{ $c->deskripsi }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Header</label>
                        <input type="file" name="image" class="form-control">
                    </div>
            </div>
                
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-success" value="Update">
                </form>
            </div>
      
          </div>
        </div>
      </div>
      @endforeach
@endsection
