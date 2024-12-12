@extends('layoutes.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Toko Nelson</h1>
        <ol class="breadcrumb mb-4 bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="{{ route('index.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Product</li>
        </ol>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-plus me-2">Add Product Data</i>
            </div>
            <div class="card-body">
                <form action="{{ route('index.post') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('productName') is-invalid @enderror" id="productName" name="productName" value="{{ old('productName') }}" placeholder="Input product name">
                        @error('productName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" placeholder="Input product Category">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Input selling price">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="productDesc" class="form-label">Description</label>
                        <input type="text" class="form-control @error('productDesc') is-invalid @enderror" id="productDesc" name="productDesc" value="{{ old('productDesc') }}" placeholder="Input buying price">
                        @error('productDesc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="productDesc" class="form-label">Description</label>
                        <textarea class="form-control @error('productDesc') is-invalid @enderror" id="productDesc" name="productDesc" rows="4" placeholder="Input product description">{{ old('productDesc') }}</textarea>
                        @error('productDesc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="productImg" class="form-label">Product Image</label>
                        <input type="file" class="form-control @error('productImg') is-invalid @enderror" id="productImg" name="productImg">
                        @error('productImg')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('index.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
