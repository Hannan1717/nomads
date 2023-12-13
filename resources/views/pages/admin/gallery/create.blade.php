@extends('layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Add Gallery</h1>
      </div>

      <!-- Content Row -->
      @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      <div class="card shadow">
         <div class="card-body">
            <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <label for="title">Package Travel</label>
                  <select name="travel_packages_id" required class="form-control">
                     <option value="">Choose Package Travel</option>
                     @foreach ($travel_packages as $trp)
                        <option value="{{ $trp->id }}">
                           {{ $trp->title }}
                        </option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="image">Image</label>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" name="image"
                        aria-describedby="inputGroupFileAddon01">
                     <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary btn-block">
                  Simpan
               </button>
            </form>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
@endsection
