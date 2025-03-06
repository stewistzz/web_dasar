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
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              {{-- menambahkan button untuk menambahkan data mahasiswa --}}
              <a href="{{ route('create') }}" class="btn btn-primary mb-3"><i class="fas fa-add"></i> Tambah</a>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Responsive Hover Table</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $d->name }}</td>
                          <td>{{ $d->email }}</td>
                          <td>
                            {{-- route untuk mengarahkan kedalam menu edit data --}}
                            <a href="{{ route('edit', ['id' => $d->id]) }}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                            <a data-toggle="modal" data-target="#modal-delete{{ $d->id }}" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                          </td>
                        </tr>

                        {{-- modal --}}
                        {{-- menambahkan identifikasi tiap idnya dari user --}}
                        <div class="modal fade" id="modal-delete{{ $d->id }}"> 
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Hapus Data Pengguna</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Yakin untuk menghapus data dengan nama <b>{{ $d->name }}</b></p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                {{-- form untuk melakukan action delete --}}
                                <form action="{{ route('delete', ['id' => $d->id]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection