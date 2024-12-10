@extends('layoutes.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Navigation</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('index.index') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.show') }}">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-9">
                <h1 class="mt-4">Toko Nelson</h1>
                <ol class="breadcrumb mb-4 bg-light p-2 rounded">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Product List</h5>
                        <a href="{{ route('index.create') }}" class="btn btn-light btn-sm shadow-sm">
                            <i class="fas fa-plus me-2">Add Product</i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-hover align-middle text-center">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Selling Price</th>
                                        <th>Purchase Price</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->nama }}</td>
                                            <td>{{ $product->jenis }}</td>
                                            <td>Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                                            <td>
                                                <img src="{{ $product->foto ? url('image/' . $product->foto) : url('image/nophoto.jpg') }}" 
                                                     class="img-fluid rounded shadow-sm" style="width: 60px; height: auto;">
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('index.edit', $product->id) }}" class="btn btn-sm btn-outline-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center">Are you sure you want to delete <strong>{{ $product->nama }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('index.destroy', $product->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Initialize DataTables -->
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#datatablesSimple').DataTable({
                    responsive: true,
                    paging: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                });
            });
        </script>
    @endpush
@endsection