@extends('admin.layouts.main')
@extends('admin.layouts.top_bar')
@section('page_title', 'Claims')

@section('header_styles')
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container input {
            flex: 1;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid no-print" id="kt_content">
        <div class="row">
            <!-- Claims Table -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mt-7">Claims</h4>
                    </div>
                    <div class="card-body">
                        <div class="search-container">
                            <input type="text" id="invoice_search" class="form-control"
                                placeholder="Search by Invoice ID">
                            <button class="btn btn-primary" id="search_button">Search</button>
                        </div>
                        <table class="table table-striped" id="claims_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Invoice ID</th>
                                    <th>Quantity Claimed</th>
                                    <th>Claim Date</th>
                                </tr>
                            </thead>
                            <tbody id="claims_body">
                                <!-- Claims data will be dynamically populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let claimsData = [];
            const claimsTable = $('#claims_table').DataTable();

            function fetchClaims(shopId) {
                fetch(`/api/claims/${shopId}`)
                    .then(response => response.json())
                    .then(data => {
                        claimsData = data;
                        populateClaimsTable(data);
                    })
                    .catch(error => console.error('Error fetching claims:', error));
            }

            function populateClaimsTable(data) {
                claimsTable.clear();
                data.forEach((claim, index) => {
                    claimsTable.row.add([
                        index + 1,
                        claim.product_name,
                        claim.invoice_id,
                        claim.quantity,
                        new Date(claim.created_at).toLocaleString(),
                    ]);
                });
                claimsTable.draw();
            }

            // Search functionality
            document.getElementById('search_button').addEventListener('click', function () {
                const searchValue = document.getElementById('invoice_search').value.trim();
                const filteredData = claimsData.filter(claim => claim.invoice_id.toString().includes(searchValue));
                populateClaimsTable(filteredData);
            });

            // Fetch claims for the shop on page load
            const shopId = {{ $shop_id }};
            fetchClaims(shopId);
        });
    </script>
@endsection
