@extends('layouts.app')
@section('head')
    <link href="{{ asset('module/booking/css/checkout.css?_ver='.config('app.version')) }}" rel="stylesheet">
@endsection
@section('content')
    <div class="bravo-booking-page padding-content" >
        <div class="container">
            <div id="bravo-checkout-page" >
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="form-title">{{__('Booking Submission')}}</h3>
                         <div class="booking-form">
                             @include ($service->checkout_form_file ?? 'Booking::frontend/booking/checkout-form')

                         </div>
                    </div>
                    <div class="col-md-4">
                        <div class="booking-detail booking-form">
                            @include ($service->checkout_booking_detail_file ?? '')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection
@section('footer')
    <script src="{{ asset('module/booking/js/checkout.js') }}"></script>
    <script type="text/javascript">
        jQuery(function () {
            $.ajax({
                'url': bookingCore.url + '{{$is_api ? '/api' : ''}}/booking/{{$booking->code}}/check-status',
                'cache': false,
                'type': 'GET',
                success: function (data) {
                    if (data.redirect !== undefined && data.redirect) {
                        window.location.href = data.redirect
                    }
                }
            });
        })

        $('.deposit_amount').on('change', function(){
            var credit_input = $(this).val();
            var convert_to_money = credit_input * {{ setting_item('wallet_credit_exchange_rate',1)}};
            var pay_now_need_pay = parseInt({{@$booking->deposit}}) - convert_to_money;
            if(pay_now_need_pay < 0){
                pay_now_need_pay = 0;
            }
            $('.convert_pay_now').html(bravo_format_money(pay_now_need_pay));
            $('.convert_deposit_amount').html(bravo_format_money(convert_to_money));
        });

    </script>
    <script>
        $(document).on('click','#btn_submit',function(){
            var code=$('#coupon_code').val();
            var page_code='{{$booking->code}}';
            $.ajax({
                url:'{{route("booking.coupon")}}',
                type: 'POST',
                data: {'code':code,'page_code':page_code},

                success: function (data) {
                    data= JSON.parse(data);
                    console.log(data.status);
                    if (data.status === 1) {
                       $('#booking_total').text(data.discounted_price);
                       $('.discounted_span').text(data.discount);
                       $('.coupon_msg').css('color','green');
                       $('#discounted_price').val(data.discounted_price);
                       $('#amount_total').val(data.discounted_price);

                       $('.coupon_msg').html(data.message);
                    } else {
                        $('.coupon_msg').css('color','red');
                       $('.coupon_msg').html(data.message);
                       $('#booking_total').text({{$booking->total}});
                       $('#amount_total').val(data.discounted_price);
                       $('.discounted_span').text(0);
                    }
                 }

            });
        });
    </script>
    <script>
        $(document).on('click','input[name=how_to_pay]',function(){
            if($(this).val()=='deposit')
            {
                $('#amount_total').val({{$booking->deposit}});
            }
            else
            {
                $('#amount_total').val({{$booking->total_before_fees*(1+18/100)+$booking->total-$booking->total_before_fees}});
            }
            
        });
    </script>

@endsection
