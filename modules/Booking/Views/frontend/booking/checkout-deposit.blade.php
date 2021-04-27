@if(floatval($booking->deposit))

    <hr>

    <div class="form-section">

        <h4 class="form-section-title">{{__("How do you want to pay?")}}</h4>

        <div class="deposit_types gateways-table accordion ">

            <div class="card">

                <div class="card-header">

                    <div class="d-flex justify-content-between">

                        <h4 class="mb-0"><label ><input type="radio"  name="how_to_pay" value="deposit">

                                {{__("Pay deposit")}}

                            </label></h4>

                        <span class="price"><strong>{{format_money($booking->deposit)}}</strong></span>

                    </div>

                </div>

            </div>

            <div class="card">

                <div class="card-header">

                    <div class="d-flex justify-content-between">

                        <h4 class="mb-0"><label ><input type="radio"  name="how_to_pay" value="full">

                                {{__("Pay in full")}}

                            </label></h4>

                        <span class="price"><strong>{{format_money($booking->total_before_fees*(1+18/100)+$booking->total-$booking->total_before_fees)}}</strong></span>
                        
                    </div>

                </div>

            </div>

        </div>
        <span class="text-danger">You must choose at least one option.</span>
    </div>

@endif

