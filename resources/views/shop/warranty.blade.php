@extends('shop.layouts.main')
@extends('shop.layouts.top_bar')
@section('page_title', 'Warranty Claims')

@section('header_styles')
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        @media print {
            .no-print, #kt_header, #kt_footer {
                display: none !important;
            }

            #print_invoice {
                width: 4in;
                margin: auto;
            }

            #print_invoice table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            #print_invoice th, #print_invoice td {
                border: 1px solid black;
                padding: 5px;
                word-wrap: break-word;
            }

            #print_invoice th {
                text-align: left;
            }

            #print_invoice th:nth-child(1),
            #print_invoice td:nth-child(1) {
                width: 40%;
                text-align: left;
            }

            #print_invoice th:nth-child(2),
            #print_invoice td:nth-child(2) {
                width: 15%;
                text-align: center;
            }

            #print_invoice th:nth-child(3),
            #print_invoice td:nth-child(3),
            #print_invoice th:nth-child(4),
            #print_invoice td:nth-child(4) {
                width: 22.5%;
                text-align: right;
            }
        }

        @media screen {
            #print_invoice {
                display: none;
            }
        }
    </style>
@endsection

@section('content')

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid no-print" id="kt_content">
        <div class="row">
            <!-- Left Container: Invoice Search -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mt-7">Search Invoice</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <input type="text" id="invoice_search" class="form-control me-3" placeholder="Enter Invoice ID">
                            <button class="btn btn-primary" id="search_button">Search</button>
                        </div>
                        <div id="customer_details" class="mb-4">
                            <!-- Customer Details will be dynamically added here -->
                        </div>
                        <table class="table table-striped" id="invoice_products_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Warranty Status</th>
                                    <th>Claim Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="invoice_products_body">
                                <!-- Invoice Products will populate here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Left Container -->

            <!-- Right Container: Warranty Claims Preview -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mt-7">Claim Preview</h4>
                    </div>
                    <div class="card-body">
                        <div id="claim_customer_details" class="mb-4">
                            <!-- Customer Details for Claims -->
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Claim Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="claim_preview_body">
                                <!-- Claimed items will appear here -->
                            </tbody>
                        </table>
                        <button class="btn btn-primary mt-3" id="claim_button">Save & Print Claims</button>
                    </div>
                </div>
            </div>
            <!-- End Right Container -->
        </div>
    </div>

    <!-- Print Invoice -->
    <div id="print_invoice">
        <div class="text-center">
            <h2>{{ $shop_name }}</h2>
            <hr>
            <p>Claim on Invoice Id: <span id="print_invoice_id"></span></p>
            <p>Date: <span id="print_date"></span></p>
            <p>Customer Name: <span id="print_customer_name"></span></p>
            <p>Customer Phone: <span id="print_customer_phone"></span></p>
            <hr>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Claim Quantity</th>
                </tr>
            </thead>
            <tbody id="print_claim_body">
                <!-- Claimed items will appear here -->
            </tbody>
        </table>
        <hr>
        <div class="text-center">
            <p>Thank you for claiming with us!</p>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let claims = [];
            let customerDetails = {};

            document.getElementById('search_button').addEventListener('click', function () {
            
                const invoiceId = document.getElementById('invoice_search').value;
                if (invoiceId) {
                    // Clear previous claim preview
                    claims = [];
                    updateClaimsPreview();

                    // Fetch invoice data
                    fetch(`/api/warranty/invoice/${invoiceId}`)
                        .then(response => response.json())
                        .then(data => {
                            const tbody = document.getElementById('invoice_products_body');
                            const customerDetailsDiv = document.getElementById('customer_details');
                            tbody.innerHTML = '';
                            customerDetails = {
                                name: data.customer_name || 'N/A',
                                phone: data.customer_phone || 'N/A',
                                time: data.sale_date || 'N/A',
                            };
                            customerDetailsDiv.innerHTML = `
                                <p><strong>Customer Name:</strong> ${customerDetails.name}</p>
                                <p><strong>Phone:</strong> ${customerDetails.phone}</p>
                                <p><strong>Invoice Date:</strong> ${customerDetails.time}</p>
                            `;

                            data.products.forEach((product, index) => {
                                tbody.innerHTML += `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td>${product.name}</td>
                                        <td>${product.quantity}</td>
                                        <td>${product.warranty_status}</td>
                                        <td>
                                            ${
                                                product.warranty_status === 'Valid'
                                                    ? `<input type="number" class="form-control claim-quantity" data-id="${product.id}" max="${product.quantity}" min="1" value="1">`
                                                    : ''
                                            }
                                        </td>
                                        <td>
                                            ${
                                                product.warranty_status === 'Valid'
                                                    ? `<button class="btn btn-success btn-sm claim-btn" data-id="${product.id}" data-name="${product.name}">Claim</button>`
                                                    : ''
                                            }
                                        </td>
                                    </tr>
                                `;
                            });
                        });
                }

                document.getElementById('claim_customer_details').innerHTML = '';
            });

            document.getElementById('invoice_products_body').addEventListener('click', function (event) {
                if (event.target.classList.contains('claim-btn')) {
                    const id = event.target.getAttribute('data-id');
                    const name = event.target.getAttribute('data-name');
                    const quantityInput = document.querySelector(`.claim-quantity[data-id="${id}"]`);
                    const claimQuantity = parseInt(quantityInput.value, 10);
                    const maxQuantity = parseInt(quantityInput.getAttribute('max'), 10);

                    if (claimQuantity <= 0 || claimQuantity > maxQuantity) {
                        alert(`Invalid claim quantity. Maximum allowed is ${maxQuantity}.`);
                        return;
                    }

                    // Check if the item already exists in the claims preview
                    const existingClaim = claims.find((claim) => claim.id === id);
                    if (existingClaim) {
                        const totalClaimedQuantity = existingClaim.quantity + claimQuantity;

                        if (totalClaimedQuantity > maxQuantity) {
                            alert(
                                `Cannot claim this quantity as the total claimed quantity (${totalClaimedQuantity}) exceeds the purchased quantity (${maxQuantity}).`
                            );
                        } else {
                            existingClaim.quantity += claimQuantity; // Update the quantity
                            updateClaimsPreview();
                        }
                    } else {
                        // Add new item to the claims list
                        claims.push({ id, name, quantity: claimQuantity });
                        updateClaimsPreview();
                    }
                }
            });


            function updateClaimsPreview() {
                const tbody = document.getElementById('claim_preview_body');
                const claimCustomerDiv = document.getElementById('claim_customer_details');
                tbody.innerHTML = '';
                
                // Get today's date
                const today = new Date();
                const formattedDate = `${String(today.getDate()).padStart(2, '0')}-${String(today.getMonth() + 1).padStart(2, '0')}-${today.getFullYear()}`; // Format: DD-MM-YYYY

                claims.forEach((claim, index) => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${claim.name}</td>
                            <td>${claim.quantity}</td>
                            <td><button class="btn btn-danger btn-sm remove-claim" data-index="${index}">Remove</button></td>
                        </tr>
                    `;
                });

                claimCustomerDiv.innerHTML = `
                    <p><strong>Customer Name:</strong> ${customerDetails.name}</p>
                    <p><strong>Phone:</strong> ${customerDetails.phone}</p>
                    <p><strong>Claim Date:</strong> ${formattedDate}</p>
                `;
            }

            document.getElementById('claim_preview_body').addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-claim')) {
                    const index = event.target.getAttribute('data-index');
                    claims.splice(index, 1);
                    updateClaimsPreview();
                }
            });

            document.getElementById('claim_button').addEventListener('click', function () {
            // Extract shop_id from a hidden input or a variable (e.g., `window.shop_id`).
            const shopId = {{ $shop_id }}; // Ensure this variable is passed from the controller

            // Map claims to the required structure
            const formattedClaims = claims.map((claim) => ({
                product_id: claim.id,
                invoice_id: document.getElementById('invoice_search').value, // Invoice ID from search
                quantity: claim.quantity,
            }));

            // Prepare payload
            const payload = {
                claims: formattedClaims,
                shop_id: shopId,
            };

            // Send POST request
            fetch('/api/warranty/claim/store', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload),
            })
                .then(async (response) => {
                    res = await response.json();
                    
                    if (!response.ok) {
                        throw new Error(res.message || 'An error occurred while saving claims.');
                    }
                    return res;
                })
                .then(() => {
                    
                    updatePrintInvoice();
                    window.print();
                    claims = [];
                    updateClaimsPreview();
                    alert('Claims saved successfully!');
                })
                .catch((error) => {
                    alert(error.message);
                    
                });
        });


            function updatePrintInvoice() {
                const tbody = document.getElementById('print_claim_body');
                const printCustomerName = document.getElementById('print_customer_name');
                const printCustomerPhone = document.getElementById('print_customer_phone');
                const printDate = document.getElementById('print_date');
                const printInvoiceId = document.getElementById('print_invoice_id');

                printCustomerName.textContent = customerDetails.name;
                printCustomerPhone.textContent = customerDetails.phone;
                printDate.textContent = new Date().toLocaleDateString();
                printInvoiceId.textContent = document.getElementById('invoice_search').value;

                tbody.innerHTML = '';
                claims.forEach(claim => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${claim.name}</td>
                            <td>${claim.quantity}</td>
                        </tr>
                    `;
                });
            }
        });
    </script>
@endsection
