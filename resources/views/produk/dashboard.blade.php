@extends('layoutes.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <!-- Dashboard Statistics -->
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-primary shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Products</h5>
                                    <p class="card-text display-6">{{ count($products) }}</p>
                                </div>
                                <i class="fas fa-box-open fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-success shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Categories</h5>
                                    <p class="card-text display-6">
                                        {{ count(array_unique(array_column($products, 'category'))) }}
                                    </p>
                                </div>
                                <i class="fas fa-tags fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-warning shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Highest Price</h5>
                                    <p class="card-text display-6">
                                        Rp {{ number_format(max(array_column($products, 'price')), 2) }}
                                    </p>
                                </div>
                                <i class="fas fa-dollar-sign fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-info shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Recent Added</h5>
                                    <p class="card-text display-6">{{ $products[0]['productName'] ?? 'N/A' }}</p>
                                </div>
                                <i class="fas fa-plus-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product List -->
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-list me-2"></i>Product List
                        </h5>
                        <div>
                            <a href="{{ route('index.create') }}" class="btn btn-light btn-sm shadow-sm me-2">
                                <i class="fas fa-plus me-1"></i>Add Product
                            </a>
                            <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#filterModal">
                                <i class="fas fa-filter me-1"></i>Filter
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-hover align-middle text-center">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        {{-- @dd($product); // Check the structure of each product --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product["productName"] ?? 'N/A'}}</td>
                                            <td>{{ $product['category'] ?? 'N/A'}}</td>
                                            <td>Rp {{ number_format($product['price']?? 0, 2) }}</td>
                                            <td>{{ $product['productDesc'] ?? 'N/A' }}</td>
                                            <td>
                                                @if(!empty($product['productImg']))
                                                    <img src="{{ asset('storage/' . $product['productImg']) }}" 
                                                            class="img-fluid rounded shadow-sm" 
                                                            style="width: 60px; height: auto;"
                                                            onerror="this.onerror=null; this.src='{{ asset('default-image.png') }}'">
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td>                                           
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('index.edit', $product['productId']) }}" class="btn btn-sm btn-outline-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product['productId'] }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Delete Confirmation Modal -->
                                        {{-- <div class="modal fade" id="deleteModal{{ $product['productId'] }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product['productId'] }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $product['productId'] }}">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center">Are you sure you want to delete <strong>{{ $product['productName'] }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('index.destroy', $product['productId']) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="productFilterForm">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" id="categoryFilter">
                                <option value="">All Categories</option>
                                @php
                                    $categories = array_unique(array_column($products, 'category'));
                                @endphp
                                @foreach($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price Range</label>
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control" id="minPrice" placeholder="Min Price">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" id="maxPrice" placeholder="Max Price">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="applyFilterBtn">Apply Filter</button>
                    <button type="button" class="btn btn-outline-secondary" id="resetFilterBtn">Reset</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTable hanya SATU KALI
            var table = $('#datatablesSimple').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                info: true,
                autoWidth: false,
                language: {
                    searchPlaceholder: "Search products...",
                    search: ""
                }
            });

            // Apply Filter Button Click Event
            $('#applyFilterBtn').on('click', function() {
                // Get filter values
                var category = $('#categoryFilter').val();
                var minPrice = parseFloat($('#minPrice').val()) || 0;
                var maxPrice = parseFloat($('#maxPrice').val()) || Infinity;

                // Custom filtering function
                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    // Get actual price from the table (removing 'Rp' and converting to float)
                    var price = parseFloat(data[3].replace('Rp ', '').replace(/,/g, '')) || 0;
                    var productCategory = data[2];

                    // Check category and price conditions
                    var categoryMatch = !category || productCategory === category;
                    var priceMatch = price >= minPrice && price <= maxPrice;

                    return categoryMatch && priceMatch;
                });

                // Redraw the table with the new filter
                table.draw();

                // Clear the custom filtering
                $.fn.dataTable.ext.search.pop();

                // Close the modal
                $('#filterModal').modal('hide');
            });

            // Reset Filter Button Click Event
            $('#resetFilterBtn').on('click', function() {
                // Clear all filter inputs
                $('#categoryFilter').val('');
                $('#minPrice').val('');
                $('#maxPrice').val('');

                // Remove any existing search and custom filters
                $.fn.dataTable.ext.search = [];
                table.search('').columns().search('').draw();
            });
        });
    </script>
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#datatablesSimple').DataTable({
                    responsive: true,
                    paging: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    language: {
                        searchPlaceholder: "Search products...",
                        search: ""
                    }
                });
            });
        </script>
    @endpush
@endsection