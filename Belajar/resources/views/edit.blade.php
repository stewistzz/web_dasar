{{-- menampilkan kembali data dari table user --}}

@extends('layout.main');

{{-- section --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
{{-- untuk update rubah route dan menambahkan parameter idnya --}}
            <form action="{{ route('update', ['id' => $data->id]) }}" method="post">
                @csrf
                {{-- karena untuk update menggunakan put, perlu mendifine method --}}
                @method('PUT')
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Data User</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            {{-- tambahkan value untuk mengambil data sebelumnya yang akan diedit --}}
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ $data->email }}">
                            {{-- menampilkan pesan dari kesalahan error sesuai dengan nama atribut --}}
                            @error('email')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Nama</label>
                            {{-- tambahkan value untuk mengambil data sebelumnya yang akan diedit --}}
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="{{ $data->name }}">
                            </div>
                            {{-- menampilkan pesan dari kesalahan error sesuai dengan nama atribut --}}
                            @error('name')
                                <small>{{ $message }}</small>
                            @enderror
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >
                          </div>
                          {{-- menampilkan pesan dari kesalahan error sesuai dengan nama atribut --}}
                          @error('password')
                          <small>{{ $message }}</small>
                      @enderror
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
        
                  </div>
                  <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </form>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
@endsection