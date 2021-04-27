@if (request()->segment(3)=='checkout')
<div class="review-section section-coupon-form">
    <h5 class="section-title">{{__('Coupon Code')}}</h5>
    <div class="input-group mb-3">
        <input type="text" id="coupon_code" name="coupon_code"  class="form-control" >
        <div class="input-group-append">
            <button class="btn btn-primary" id="btn_submit" type="button" >{{__("Apply")}}</button>

        </div>
    </div>
    <div class="coupon_msg"></div>
</div>

@endif


