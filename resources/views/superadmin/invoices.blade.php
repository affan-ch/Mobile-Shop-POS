@extends('superadmin.layouts.main')
@extends('superadmin.layouts.top_bar')

@section('page_title', 'Invoices')

@section('header_styles')
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        /* Hide elements with the 'no-print' class during printing */
        @media print {
            .no-print, #kt_header, #kt_footer, #invoice_details_modal {
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
                word-wrap: break-word;
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

@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Post-->
    <div class="content flex-row-fluid no-print" id="kt_content">
        <div class="row">
            <!-- Invoice List Container -->
            <div class="col-md-12">
                <div class="card-body mt-n10">
                    <div class="row">
                        <div class="col-md-3 mt-10">
                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 ">
                                <div class="d-flex justify-content-between">
                                    <div class="symbol symbol-30px me-5 mb-8">
                                        <span class="symbol-label">
                                            <span class="fs-2qx fas fa-chart-line text-primary">
                                            </span>
                                        </span>
                                    </div>
                                    <div class="symbol   me-5 mb-8">
                                        <span class="text-dark fw-boldest d-block fs-2qx lh-1 mb-1">{{ number_format($totalSalesThisMonth, 2) }} <span class="fs-6">AED</span></span>
                                    </div>
                                </div>
                                <div class=" mt-10">
                                    <span class="text-gray-700 fw-bold fs-2">Total Sales this Month</span>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3 mt-10">
                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 ">
                                <div class="d-flex justify-content-between">
                                    <div class="symbol symbol-30px me-5 mb-8">
                                        <span class="symbol-label">
                                            <span class="fs-2qx fas fa-dollar-sign text-primary">
                                            </span>
                                        </span>
                                    </div>
                                    <div class="symbol   me-5 mb-8">
                                        <span class="text-dark fw-boldest d-block fs-2qx lh-1 mb-1">{{ number_format($totalSalesTillNow, 2) }} <span class="fs-6">AED</span></span>
                                    </div>
                                </div>
                                <div class=" mt-10">
                                    <span class="text-gray-700 fw-bold fs-2">Total Sales till Now</span>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="mt-7">Invoices</h4>
                    </div>
                    <div class="card-body">

                    <div class="form-group w-250px mt-2 mb-5">

                        <input type="text" id="invoice_search_input" class="form-control" placeholder="Search By Invoice ID">
                    </div>
                        <table class="table table-striped" id="kt_invoice_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Total Bill</th>
                                    <th>Discount</th>
                                    <th>Final Bill</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->total_bill }}</td>
                                    <td>{{ $invoice->discount }}</td>
                                    <td>{{ $invoice->final_bill }}</td>
                                    <td>{{ $invoice->customer_name ? $invoice->customer_name : 'N/A' }}</td>
                                    <td>{{ $invoice->customer_phone ? $invoice->customer_phone : 'N/A' }}</td>
                                    <td>{{ $invoice->created_at }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info view-details"
                                                data-id="{{ $invoice->id }}">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No invoices available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

    <!-- Invoice Details Modal -->
    <div class="modal fade" id="invoice_details_modal" tabindex="-1" role="dialog" aria-labelledby="invoiceDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Invoice Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="invoice-preview">
                        <!-- Content dynamically inserted from JavaScript -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="print_invoice_btn">Print Invoice</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Invoice Template -->
    <div id="print_invoice">
        <div class="text-center">
            <h2>{{ $shop_name }}</h2>
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
                <!-- Items will appear here -->
            </tbody>
        </table>
        <hr>
        <h3>Total: <span id="print_total">0</span> AED</h3>
        <h3>Discount: <span id="print_discount">0</span> AED</h3>
        <h3>Final Total: <span id="print_invoice_total">0</span> AED</h3>
        <div class="text-center">
            <p>Thank you for shopping with us!</p>
        </div>
    </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const invoiceTable = $('#kt_invoice_table').DataTable();


    let currentInvoice = null; // Global variable to store the fetched invoice data
    const PrintInvoiceBtn = document.getElementById('print_invoice_btn');

    // Search functionality for Invoice ID
    document.getElementById('invoice_search_input').addEventListener('keyup', function() {
        // invoiceTable.search(this.value).draw();
        const searchValue = this.value;
        invoiceTable.column(0).search(searchValue).draw();
    });

    // Handle the View Details button click
    document.querySelectorAll('.view-details').forEach(button => {
        button.addEventListener('click', function() {
            const invoiceId = this.getAttribute('data-id');

            // Fetch invoice details including products via AJAX
            fetch(`/api/invoice/${invoiceId}/details`)
                .then(response => response.json())
                .then(invoice => {
                    currentInvoice = invoice; // Store the invoice data globally

                    const invoiceBody = document.querySelector('.invoice-preview');

                    let productsHtml = '';
                    invoice.sales.forEach(sale => {
                        // Ensure both sale_price and quantity are numbers
                        const salePrice = parseFloat(sale.sale_price) || 0;
                        const quantity = parseInt(sale.quantity) || 1; // Default quantity to 1 if undefined
                        const total = (salePrice * quantity).toFixed(2); // Calculate total price

                        productsHtml += `
                            <tr>
                                <td>${sale.product.name}</td>
                                <td>${quantity}</td>
                                <td>${salePrice.toFixed(2)}</td>
                                <td>${total}</td>
                            </tr>
                        `;
                    });

                    invoiceBody.innerHTML = `
                        <h5>Invoice ID: ${invoice.id}</h5>
                        <h5>Customer Name: ${invoice.customer_name ? invoice.customer_name : 'N/A'}</h5>
                        <h5>Customer Phone: ${invoice.customer_phone ? invoice.customer_phone : 'N/A'}</h5>
                        <h5>Created At: ${new Date(invoice.created_at).toLocaleString('en-US', {
                            month: 'long',
                            day: 'numeric',
                            year: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric',
                            second: 'numeric',
                            hour12: true
                        })}</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${productsHtml}
                            </tbody>
                        </table>
                        <h4>Total: ${parseFloat(invoice.total_bill).toFixed(2)} AED</h4>
                        <h4>Discount: ${parseFloat(invoice.discount).toFixed(2)} AED</h4>
                        <h4>Final Total: ${parseFloat(invoice.final_bill).toFixed(2)} AED</h4>
                    `;

                    // Show the modal
                    $('#invoice_details_modal').modal('show');
                    updatePrintInvoice();

                })
                .catch(error => console.error('Error fetching invoice details:', error));
        });
    });


    function updatePrintInvoice(){
        let productsHtml = '';
        currentInvoice.sales.forEach(sale => {
            const salePrice = parseFloat(sale.sale_price) || 0;
            const quantity = parseInt(sale.quantity) || 1;
            const total = (salePrice * quantity).toFixed(2);

            productsHtml += `
                <tr>
                    <td>${sale.product.name}</td>
                    <td>${quantity}</td>
                    <td>${salePrice.toFixed(2)}</td>
                    <td>${total}</td>
                </tr>
            `;
        });

        // Populate the print_invoice content
        document.getElementById('print_customer_name').textContent = currentInvoice.customer_name ? currentInvoice.customer_name : 'N/A';
        // update date by invoice created_at formatted date and time 12 hour format
        const date = new Date(currentInvoice.created_at);
        document.getElementById('print_date').textContent = date.toLocaleString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: true
        });

        document.getElementById('print_customer_phone').textContent = currentInvoice.customer_phone ? currentInvoice.customer_phone : 'N/A';
        document.getElementById('print_invoice_body').innerHTML = productsHtml;
        document.getElementById('print_invoice_id').textContent = currentInvoice.id;
        document.getElementById('print_total').textContent = parseFloat(currentInvoice.total_bill).toFixed(2);
        document.getElementById('print_discount').textContent = parseFloat(currentInvoice.discount).toFixed(2);
        document.getElementById('print_invoice_total').textContent = parseFloat(currentInvoice.final_bill).toFixed(2);
    }

    // Handle printing of the invoice
    PrintInvoiceBtn.addEventListener('click', function() {
        // Show the print section and print
        document.getElementById('print_invoice').style.display = 'block';
        window.print();
        document.getElementById('print_invoice').style.display = 'none';
    });
});



        </script>
@endsection
