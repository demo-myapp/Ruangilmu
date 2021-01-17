{{-- <!-- MEMANGGIL MASTER TEMPLATE YANG SUDAH DIBUAT SEBELUMNYA, YAKNI admin.blade.php -->
@extends('layouts.admin')

@section('title', 'Categories')

@section('content-url')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Categories</li>
</ol>
@endsection

@section('content')
<main class="main">

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
              	
              	<!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Category</h4>
                        </div>
                        <div class="card-body">
                          
                            <!-- PADA SUB-CHAPTER SELANJUTNYA, KETIKA ADA INSTRUKSI UNTUK ME-REPLACE FORM INPUT NEW CATEGORY MAKA CARI KOMENTAR INI DAN REPLACE DENGAN CODE YANG ADA DISANA -->
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <input type="text" name="name" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Category</label>
                                      <!-- VARIABLE $PARENT PADA METHOD INDEX KITA GUNAKAN DISINI -->
                                    <!-- UNTUK MENAMPILKAN DATA CATEGORY YANG PARENT_ID NYA NULL -->
                                    <!-- UNTUK DIPILIH SEBAGAI PARENT TAPI SIFATNYA OPTIONAL -->
                                    <select name="parent_id" class="form-control">
                                        <option value="">None</option>
                                        @foreach ($parent as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Add</button>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
                <!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
              
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Categories</h4>
                        </div>
                        <div class="card-body">
                          	<!-- KETIKA ADA SESSION SUCCESS  -->
                            @if (session('success'))
                              <!-- MAKA TAMPILKAN ALERT SUCCESS -->
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <!-- KETIKA ADA SESSION ERROR  -->
                            @if (session('error'))
                              <!-- MAKA TAMPILKAN ALERT DANGER -->
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Parent</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      	<!-- LOOPING DATA KATEGORI SESUAI JUMLAH DATA YANG ADA DI VARIABLE $CATEGORY -->
                                        @forelse ($category as $val)
                                        <tr>
                                            <td></td>
                                            <td><strong>{{ $val->name }}</strong></td>
                                          
                                          	<!-- MENGGUNAKAN TERNARY OPERATOR, UNTUK MENGECEK, JIKA $val->parent ADA MAKA TAMPILKAN NAMA PARENTNYA, SELAIN ITU MAKA TANMPILKAN STRING - -->
                                            <td>{{ $val->parent ? $val->parent->name:'-' }}</td>
                                          
                                            <!-- FORMAT TANGGAL KETIKA KATEGORI DIINPUT SESUAI FORMAT INDONESIA -->
                                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                            <td>
                                              
                                                <!-- FORM ACTION UNTUK METHOD DELETE -->
                                                <form action="{{ route('category.destroy', $val->id) }}" method="post">
                                                    <!-- KONVERSI DARI @ CSRF & @ METHOD AKAN DIJELASKAN DIBAWAH -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('category.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- JIKA DATA CATEGORY KOSONG, MAKA AKAN DIRENDER KOLOM DIBAWAH INI  -->
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Empty data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- FUNGSI INI AKAN SECARA OTOMATIS MEN-GENERATE TOMBOL PAGINATION  -->
                            {!! $category->links() !!}
                        </div>
                    </div>
                </div>
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
            </div>
        </div>
    </div>
</main>
@endsection --}}

@extends('layouts.admin')

@section('title', 'Categories')

@section('content-url')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Categories</li>
</ol>
@endsection

@section('content')

      <div class="row">
        <div class="col-lg-5">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control" required>
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Sub Category</label>
                        <select name="parent_id" class="form-control">
                            <option value="">None</option>
                            @foreach ($parent as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Add</button>
                    </div>
                </form>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Categories</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @forelse ($category as $val)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $val->name }}</strong></td>
                            <td>{{ $val->parent ? $val->parent->name:'-' }}</td>
                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                            <td>
                                <form action="{{ route('category.destroy', $val->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('category.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Empty data</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                {!! $category->links() !!}
            </div>
          </div>
        </div>
      </div>    
@endsection