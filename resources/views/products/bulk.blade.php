@extends('layouts.admin')

@section('title', 'Upload Excel')

@section('content-url')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Product</li>
    <li class="breadcrumb-item active">Upload Excel</li>
</ol>
@endsection

@section('content')
<main class="main">
    <div class="">
        <div class="animated fadeIn">
            <form action="{{ route('product.saveBulk') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Choose</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}" {{ old('category_id') == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="file">Excel File</label>
                                    <input type="file" name="file" class="form-control" value="{{ old('file') }}" required>
                                    <p class="text-danger">{{ $errors->first('file') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection