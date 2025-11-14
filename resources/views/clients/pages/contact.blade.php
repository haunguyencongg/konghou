@extends('layouts.client')

@section('title', 'Liên hệ')
@section('breadcrumb', 'Liên hệ')

@section('content')

    <!-- CONTACT ADDRESS AREA START -->
    <div class="ltn__contact-address-area mb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('assets/clients/img/icons/10.png') }}" alt="Icon Image">
                        </div>
                        <h3>Địa chỉ Email</h3>
                        <p>haunc.21it@vku.udn.vn</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('assets/clients/img/icons/11.png') }}" alt="Icon Image">
                        </div>
                        <h3>Số điện thoại</h3>
                        <p>0386 823 982</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('assets/clients/img/icons/12.png') }}" alt="Icon Image">
                        </div>
                        <h3>Công ty</h3>
                        <p>Ngũ Hành Sơn, Đà Nẵng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT ADDRESS AREA END -->

    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120 mb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">Nhận báo giá</h4>
                        <form id="contact-form" action="{{ route('contact') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="Tên" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" placeholder="Số điện thoại" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="Địa chỉ email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" placeholder="Nhập tin nhắn..."></textarea>
                            </div>
                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Gửi</button>
                            </div>
                            <p class="form-messege mb-0 mt-20"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->

    <!-- GOOGLE MAP AREA START -->
    <div class="google-map mb-120">

        <h4 class="text-center mb-3 fw-bold">📍 Vị trí của chúng tôi</h4>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.734025012026!2d108.25065207490204!3d15.975260284690663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4sIMSQ4bqhaSBo4buNYyDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1763012018908!5m2!1svi!2s"
            width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
    <!-- GOOGLE MAP AREA END -->

@endsection