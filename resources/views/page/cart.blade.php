@extends('layout.index')
@section('title')
    Đơn hàng
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <section class="col-md-7">
                <h1 class=" mt-3">Giỏ hàng #{{ $order->name_user ? $order->name_user : $order->id }}</h1>
                <div class="mt-3">
                    <div class="mt-3">
                        <h3>Combo</h3>
                        <hr width="200px" class="mt-1 border border-light border-3 rounded">
                        @foreach ($combo as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-3">
                                        <img src="{{ asset('') }}images/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <span class="d-none" id="card-id">{{ $item->id }}</span>
                                            <h6 class="card-title">{{ $item->name }}</h6>
                                            <p class="card-text">
                                                @if ($item->sale_price)
                                                    <span class="h3 text-primary">{{ number_format($item->sale_price, 0, ',', '.') }} ₫</span>
                                                    <del class="ms-2 fw-light">{{ number_format($item->price, 0, ',', '.') }} ₫</del>
                                                @else
                                                    <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pe-2">
                                        <div class="input-group">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', -1)">-</button>
                                            <input type="number" class="form-control text-center" value="0" id="quantity_{{ $item->id }}" onchange="updateQuantity('{{ $item->id }}', 0)">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pe-2 d-none">
                                        <input class="form-control" type="number" value="0" name="" id="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class=" mt-3">
                        <h3>Food</h3>
                        <hr width="200px" class="mt-1 border border-light border-3 rounded">
                        @foreach ($food as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-3">
                                        <img src="{{ asset('') }}images/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <span class="d-none" id="card-id">{{ $item->id }}</span>
                                            <h6 class="card-title">{{ $item->name }}</h6>
                                            <p class="card-text">
                                                @if ($item->sale_price)
                                                    <span class="h3 text-primary">{{ number_format($item->sale_price, 0, ',', '.') }} ₫</span>
                                                    <del class="ms-2 fw-light">{{ number_format($item->price, 0, ',', '.') }} ₫</del>
                                                @else
                                                    <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pe-2">
                                        <div class="input-group">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', -1)">-</button>
                                            <input type="number" class="form-control text-center" value="0" id="quantity_{{ $item->id }}" onchange="updateQuantity('{{ $item->id }}', 0)">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pe-2 d-none">
                                        <input class="form-control" type="number" value="0" name="" id="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class=" mt-3">
                        <h3>Nước</h3>
                        <hr width="200px" class="mt-1 border border-light border-3 rounded">
                        @foreach ($drink as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-3">
                                        <img src="{{ asset('') }}images/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <span class="d-none" id="card-id">{{ $item->id }}</span>
                                            <h6 class="card-title">{{ $item->name }}</h6>
                                            <p class="card-text">
                                                @if ($item->sale_price)
                                                    <span class="h3 text-primary">{{ number_format($item->sale_price, 0, ',', '.') }} ₫</span>
                                                    <del class="ms-2 fw-light">{{ number_format($item->price, 0, ',', '.') }} ₫</del>
                                                @else
                                                    <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pe-2">
                                        <div class="input-group">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', -1)">-</button>
                                            <input type="number" class="form-control text-center" value="0" id="quantity_{{ $item->id }}" onchange="updateQuantity('{{ $item->id }}', 0)">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center pe-2 d-none">
                                        <input class="form-control" type="number" value="0" name="" id="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <aside class="col-md-5">
                <div class="container-fluid">
                    <h1>Thanh toán</h1>
                    <form action="{{ route('checkout_') }}" method="post">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody id="cart_summary">
                                <!-- Dynamic content will be added here -->
                            </tbody>
                        </table>
                        <input type="hidden" name="id_order" value="{{ $order->id }}">
                        <input type="hidden" name="order_details" id="iorder_details" value="order_details">
                        <input type="hidden" name="total_quantity" id="itotal_quantity" value="">
                        <input type="hidden" name="total_amount" id="itotal_amount" value="">
                        <hr class="border-4">
                        <div class="d-flex justify-content-between">
                            <div>Tổng số Lượng</div>
                            <div class="h5" id="total_quantity">0</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Tổng tiền</div>
                            <div class="text-primary h4" id="total_amount"></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="text" name="name_user" placeholder="Tên khách hàng" class="form-control">
                            <div class="text-primary h4" id="total_amount"></div>
                        </div>
                        <hr class="border-4">
                        <input type="submit" class="mt-3 btn btn-primary" value="Thanh toán tiền mặt">
                        <input type="submit" class="mt-3 btn btn-outline-primary" disabled value="Thanh toán online">
                    </form>
                </div>
                </á>
        </div>
    </div>
    <script>
        // Function to update quantity and calculate totals
        function updateQuantity(productId, change) {
            let quantityInput = document.getElementById('quantity_' + productId);
            let currentQuantity = parseInt(quantityInput.value);
            let newQuantity = currentQuantity + change;
            if (newQuantity < 0) {
                newQuantity = 0;
            }
            quantityInput.value = newQuantity;

            // Update cart summary
            updateCartSummary();
        }

        // Function to update cart summary
        function updateCartSummary() {
            let totalQuantity = 0;
            let totalAmount = 0;
            let cartSummary = '';

            // Iterate through each product card
            document.querySelectorAll('.card').forEach(card => {
                let productName = card.querySelector('.card-title').innerText;
                let price = parseFloat(card.querySelector('.text-primary').innerText.replace(/\D/g, '')); // Extract numeric part from price
                let quantity = parseInt(card.querySelector('input[type="number"]').value);

                // Only include products with quantity > 0
                if (quantity > 0) {
                    // Calculate subtotal for each product
                    let subtotal = quantity * price;

                    // Accumulate total quantity and total amount
                    totalQuantity += quantity;
                    totalAmount += subtotal;

                    // Append row to cart summary
                    cartSummary += `
                        <tr>
                            <td>${productName}</td>
                            <td class="text-end">${price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
                            <td class="text-center">${quantity}</td>
                            <td class="text-end">${subtotal.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
                        </tr>
                    `;
                }
            });

            // Update cart summary table body
            document.getElementById('cart_summary').innerHTML = cartSummary;

            // Update total quantity and total amount in the summary section
            document.getElementById('total_quantity').innerText = totalQuantity;
            document.getElementById('total_amount').innerText = totalAmount.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            // Update hidden form field with order details JSON
            let orderDetails = [];
            document.querySelectorAll('.card').forEach(card => {
                let productId = card.querySelector('#card-id').innerText;
                let productName = card.querySelector('.card-title').innerText;
                let price = parseFloat(card.querySelector('.text-primary').innerText.replace(/\D/g, ''));
                let quantity = parseInt(card.querySelector('input[type="number"]').value);

                if (quantity > 0) {
                    orderDetails.push({
                        id_product: productId,
                        name: productName,
                        price: price,
                        quantity: quantity
                    });
                }
            });

            // Set JSON string to hidden input field
            document.getElementById('iorder_details').value = JSON.stringify(orderDetails);
            document.getElementById('itotal_quantity').value = totalQuantity;
            document.getElementById('itotal_amount').value = totalAmount;
        }
        // Function to submit the form

        // Initial update of cart summary on page load
        updateCartSummary();
    </script>
@endsection
