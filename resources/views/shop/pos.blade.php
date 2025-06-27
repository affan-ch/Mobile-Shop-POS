@extends('shop.layouts.main')
@extends('shop.layouts.top_bar')
@section('page_title', 'POS')

@section('header_styles')
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        /* Hide elements with the 'no-print' class during printing */
        @media print {
            .no-print, #kt_header, #kt_footer {
                display: none !important;
            }

            /* Display the invoice during printing */
            #print_invoice {
                width: 4in;
                margin: auto;
            }

            #print_invoice table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            #print_invoice th,
            #print_invoice td {
                border: 1px solid black;
                padding: 5px;
                word-wrap: break-word; /* Ensure text wraps to new line instead of truncating */
            }

            #print_invoice th {
                text-align: left;
            }

            /* Column widths and alignment */
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

        /* Hide the print invoice on screen */
        @media screen {
            #print_invoice {
                display: none;
            }
        }
    </style>
@endsection

@section('header_scripts')

@endsection

@section('content')

    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-5 no-print" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!-- Page Title -->
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Point of Sale</h1>
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{ url('/shop/dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-gray-600">POS</li>
                </ul>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid no-print" id="kt_content">
            <div class="row">
                <!-- Left Container: Product List -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-7">Product List</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center position-relative my-1 mb-5">
                                <span class="svg-icon svg-icon-1 position-absolute ms-4"><i
                                        class="fa fa-search"></i></span>
                                <input type="text" data-kt-filter="search"
                                    class="form-control form-control-solid w-100 ps-14" placeholder="Search here"
                                    id="searchInput" />
                            </div>
                            <table class="table table-striped" id="kt_pos_table">
                                <thead>
                                    <tr>
                                        <th class="w-30px">#</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <input type="number" class="form-control product-price"
                                                    data-id="{{ $product->id }}"
                                                    value="{{ $product->price }}"
                                                    min="{{ $product->price }}">
                                            </td>
                                            <td><input type="number" class="form-control product-quantity"
                                                    data-id="{{ $product->id }}" value="1" min="1"></td>
                                            <td>
                                                <button class="btn btn-sm btn-success add-to-invoice"
                                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                    data-price="{{ $product->price }}">
                                                    Add
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No products available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Left Container -->

                <!-- Right Container: Invoice Preview -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-7">Invoice Preview</h4>
                        </div>
                        <div class="card-body">
                            <!-- Customer Information -->
                            <div class="form-group mt-3">
                                <label for="customer_name">Customer Name:</label>
                                <input type="text" class="form-control" id="customer_name" placeholder="Enter customer name">
                            </div>

                            <div class="form-group mt-3">
                                <label for="customer_phone">Customer Phone:</label>
                                <input type="text" class="form-control" id="customer_phone" placeholder="Enter customer phone">
                            </div>

                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="invoice_body">
                                    <!-- Invoice items will appear here -->
                                </tbody>
                            </table>
                            <!-- Total and Discount Fields -->
                            <div class="d-flex justify-content-between mt-3">
                                <h4>Total: <span id="invoice_total">0</span> AED</h4>
                            </div>

                            <!-- Discount Input -->
                            <div class="form-group mt-3">
                                <label for="discount_input">Discount (AED):</label>
                                <input type="number" step="0.01" class="form-control" id="discount_input" placeholder="Enter discount">
                            </div>

                            <!-- Final Total -->
                            <div class="d-flex justify-content-between mt-3">
                                <h4>Final Total: <span id="final_total">0</span> AED</h4>
                            </div>

                            <!-- Save & Print Button -->
                            <button class="btn btn-primary mt-3" id="print_button">Save & Print Invoice</button>
                        </div>
                    </div>
                </div>
                <!-- End Right Container -->
            </div>
        </div>
        <!--end::Post-->

        <!-- Print Invoice -->
        <div id="print_invoice">
            <div class="text-center">
                <h2>{{$shop_name}}</h2>
                <br>
                <p>Invoice Id: <span id="print_invoice_id"></p>
                <p>Date: <span id="print_date"></span></p>
                <p>Customer Name: <span id="print_customer_name"></span></p>
                <p>Customer Phone: <span id="print_customer_phone"></span></p>
                <hr>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="print_invoice_body">
                    <!-- Invoice items will appear here -->
                </tbody>
            </table>
            <hr>
            
            <!-- Show Total, Discount, and Final Total in the correct order -->
            <h3 class="text-end">Total: <span id="print_total">0</span> AED</h3>
            <h3 class="text-end">Discount: <span id="print_discount">0</span> AED</h3>
            <h3 class="text-end">Final Total: <span id="print_invoice_total">0</span> AED</h3>
            
            <div class="text-center">
                <p>Thank you for shopping with us!</p>
            </div>
        </div>
    </div>
    <!--end::Container-->

@endsection

@section('footer_scripts')
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let invoiceItems = [];
            let total = 0;
            let discount = 0;

            function updateInvoice() {
                const invoiceBody = document.getElementById('invoice_body');
                const invoiceTotal = document.getElementById('invoice_total');
                const finalTotal = document.getElementById('final_total');
                invoiceBody.innerHTML = '';

                invoiceItems.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>${item.price.toFixed(2)}</td>
                        <td>${(item.quantity * item.price).toFixed(2)}</td>
                        <td><button class="btn btn-sm btn-danger remove-from-invoice" data-index="${index}">Remove</button></td>
                    `;
                    invoiceBody.appendChild(row);
                });

                total = invoiceItems.reduce((sum, item) => sum + (item.quantity * item.price), 0);
                invoiceTotal.textContent = total.toFixed(2);

                const discountInput = document.getElementById('discount_input').value;
                discount = parseFloat(discountInput) || 0;
                const finalAmount = total - discount;
                finalTotal.textContent = finalAmount.toFixed(2);
            }

            function updatePrintInvoice(invoice_id) {
                const printInvoiceBody = document.getElementById('print_invoice_body');
                const printInvoiceTotal = document.getElementById('print_invoice_total');
                const printDate = document.getElementById('print_date');
                const printCustomerName = document.getElementById('print_customer_name');
                const printCustomerPhone = document.getElementById('print_customer_phone');
                const printInvoiceId = document.getElementById('print_invoice_id'); // Reference for Invoice ID
                const printTotal = document.getElementById('print_total');
                const printDiscount = document.getElementById('print_discount');

                printInvoiceBody.innerHTML = '';

                invoiceItems.forEach((item) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>${item.price.toFixed(2)}</td>
                        <td>${(item.quantity * item.price).toFixed(2)}</td>
                    `;
                    printInvoiceBody.appendChild(row);
                });

                printTotal.textContent = total.toFixed(2);
                printDiscount.textContent = discount.toFixed(2);
                printInvoiceTotal.textContent = (total - discount).toFixed(2);

                const formattedDate = new Date().toLocaleString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                    hour12: true
                });
                printDate.textContent = formattedDate;

                printCustomerName.textContent = document.getElementById('customer_name').value || 'N/A';
                printCustomerPhone.textContent = document.getElementById('customer_phone').value || 'N/A';

                // Update the Invoice ID in the print preview
                printInvoiceId.textContent = invoice_id || 'N/A'; // Ensure this is populated after saving the invoice
            }

            function saveInvoice() {
                const invoiceData = {
                    shop_id: {{$shop_id}}, 
                    products: invoiceItems,
                    total_bill: total,
                    discount: discount,
                    final_bill: total - discount,
                    customer_name: document.getElementById('customer_name').value,
                    customer_phone: document.getElementById('customer_phone').value,
                };

                fetch('/api/pos/invoice/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify(invoiceData),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.message === 'Invoice and sales created successfully') {
                        updatePrintInvoice(data.invoice_id); // Pass the Invoice ID
                        window.print();

                        // Clear data
                        invoiceItems = [];
                        updateInvoice();

                        document.getElementById('customer_name').value = '';
                        document.getElementById('customer_phone').value = '';
                        document.getElementById('discount_input').value = '';
                        document.getElementById('final_total').textContent = '0';
                    } else {
                        alert('Failed to save invoice!');
                    }
                })
                .catch(error => console.error('Error:', error));
            }


            document.getElementById('discount_input').addEventListener('input', updateInvoice);

            function handleAddToInvoice(event) {
                if (event.target.classList.contains('add-to-invoice')) {
                    const productId = event.target.getAttribute('data-id');
                    const productName = event.target.getAttribute('data-name');
                    const basePrice = parseFloat(event.target.getAttribute('data-price'));
                    const priceInput = document.querySelector(`.product-price[data-id='${productId}']`);
                    if(!priceInput) {
                        return;
                    }

                    if(parseFloat(priceInput.value) < basePrice) {
                        alert('Price cannot be less than the base price!');
                        return;
                    }
                    
                    const productPrice = parseFloat(priceInput.value);
                    const quantityInput = document.querySelector(`.product-quantity[data-id="${productId}"]`);
                    const productQuantity = parseInt(quantityInput.value);

                    if(productQuantity < 1){
                        alert('Quantity cannot be less than 1!');
                        return;
                    }

                    const existingItem = invoiceItems.find(item => item.id === productId);
                    if (existingItem) {
                        existingItem.quantity += productQuantity;
                    } else {
                        invoiceItems.push({
                            id: productId,
                            name: productName,
                            price: productPrice,
                            quantity: productQuantity
                        });
                    }

                    updateInvoice();
                }
            }

            function handleRemoveFromInvoice(event) {
                if (event.target.classList.contains('remove-from-invoice')) {
                    const itemIndex = event.target.getAttribute('data-index');
                    invoiceItems.splice(itemIndex, 1);
                    updateInvoice();
                }
            }

            function handlePrintInvoice() {
                if (invoiceItems.length === 0) {
                    alert('Invoice is empty!');
                    return;
                }

                saveInvoice();
            }

            document.getElementById('kt_pos_table').addEventListener('click', handleAddToInvoice);
            document.getElementById('invoice_body').addEventListener('click', handleRemoveFromInvoice);
            document.getElementById('print_button').addEventListener('click', handlePrintInvoice);
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('keyup', function() {
                $('#kt_pos_table').DataTable().search(this.value).draw();
            });

            $('#kt_pos_table').DataTable();
        });
    </script>

@endsection
