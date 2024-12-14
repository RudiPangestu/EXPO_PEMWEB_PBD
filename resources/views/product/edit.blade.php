@extends('layoutes.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4 bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ol>
 
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-edit me-2">Edit Product</i>
            </div>
            <div class="card-body">
                <form action="{{ route('api.put', $product['productId']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT for updating -->
    
                    <!-- Hidden input for productId -->
                    <input type="hidden" name="productId" value="{{ $product['productId'] }}">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('productName') is-invalid @enderror" id="productName" name="productName" value="{{ $product['productName'] }}">
                        @error('productName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ $product['category'] }}">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product['price'] }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="productDesc" class="form-label">Description</label>
                        <textarea class="form-control @error('productDesc') is-invalid @enderror" id="productDesc" name="productDesc" rows="4">{{ $product['productDesc'] }}</textarea>
                        @error('productDesc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="productImg" class="form-label">productImg Produk</label>
                        <input type="file" class="form-control @error('productImg') is-invalid @enderror" id="productImg" name="productImg">
                        @error('productImg')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-3">
                            @if(isset($product['productImg']) && !empty($product['productImg)']))
                                <img src="{{ url('image/' . $product['productImg']) }}" alt="productImg Produk" class="rounded shadow-sm" style="width: 120px; height: auto;">
                            @else
                                <img src="{{ url('image/nophoto.jpg') }}" alt="No productImg" class="rounded shadow-sm" style="width: 120px; height: auto;">
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">
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
