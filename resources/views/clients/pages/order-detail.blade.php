@extends('layouts.client')

@section('title', 'Chi tiết đơn hàng')
@section('breadcrumb', 'Chi tiết đơn hàng')

@section('content')
<div class="container my-5">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <!-- Header -->
        <div class="card-header bg-gradient p-4 text-white" 
            style="background: linear-gradient(135deg, #2a5298, #1e3c72);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold mb-1">Đơn hàng #{{ $order->id }}</h3>
                    <small class="opacity-75">Ngày đặt: {{ $order->created_at->format('d/m/Y') }}</small>
                </div>
                <span class="fs-6 px-3 py-2 rounded-pill
                    @if($order->status === 'completed') bg-success 
                    @elseif($order->status === 'pending') bg-warning text-dark
                    @elseif($order->status === 'processing') bg-info
                    @else bg-danger @endif
                ">
                    @switch($order->status)
                        @case('completed') ✅ Hoàn thành @break
                        @case('pending') ⏳ Chờ xác nhận @break
                        @case('processing') 🔄 Đang xử lý @break
                        @case('canceled') ❌ Đã hủy @break
                    @endswitch
                </span>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="fw-bold text-uppercase mb-2 text-secondary">Phương thức thanh toán</h6>
                    @if ($order->payment && $order->payment->payment_method === 'cash')
                        <span class="badge bg-primary fs-6">💵 Thanh toán khi nhận hàng</span>
                    @elseif ($order->payment && $order->payment->payment_method === 'paypal')
                        <span class="badge bg-info fs-6">💳 Thanh toán bằng PayPal</span>
                    @else
                        <span class="badge bg-secondary fs-6">❔ Chưa xác định</span>
                    @endif
                </div>
                <div class="col-md-6 text-md-end">
                    <h5 class="fw-bold text-success mb-0">Tổng tiền: 
                        {{ number_format($order->total_price, 0, ',', '.') }} ₫
                    </h5>
                </div>
            </div>

            <!-- Sản phẩm -->
            <div class="mb-4">
                <h5 class="fw-bold mb-3 border-bottom pb-2">🛍️ Sản phẩm trong đơn hàng</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" 
                                             class="rounded-3 shadow-sm" width="65">
                                    </td>
                                    <td class="text-center">
                                        <strong >{{ $item->product->name }}</strong>
                                    </td>
                                    <td class="text-center">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="fw-bold text-center">
                                        {{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Thông tin giao hàng -->
            <div class="mb-4">
                <h5 class="fw-bold mb-3 border-bottom pb-2">📦 Thông tin giao hàng</h5>
                <div class="bg-light p-3 rounded-3">
                    <ul class="list-unstyled mb-0">
                        <li><strong>Người nhận:</strong> {{ $order->shippingAddress->full_name }}</li>
                        <li><strong>Địa chỉ:</strong> {{ $order->shippingAddress->address }}</li>
                        <li><strong>Thành phố:</strong> {{ $order->shippingAddress->city }}</li>
                        <li><strong>Số điện thoại:</strong> {{ $order->shippingAddress->phone }}</li>
                    </ul>
                </div>
            </div>

            <!-- Hành động -->
            @if ($order->status == 'pending')
                <form action="{{ route('order.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?');">
                    @csrf
                    <button type="submit" class="btn btn-danger px-4 py-2 rounded-pill">
                        <i class="bi bi-x-circle me-1"></i> Hủy đơn hàng
                    </button>
                </form>
            @endif

            <!-- Đánh giá -->
            @if ($order->status == 'completed')
                <div class="mt-5">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">⭐ Đánh giá sản phẩm</h5>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Đánh giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>
                                            <a href="{{ route('product.detail', $item->product->slug) }}" 
                                               class="btn theme-btn-1 btn-effect-1">
                                                Đánh giá
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
