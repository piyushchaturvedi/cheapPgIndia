<?php
$translation = $service->translateOrOrigin(app()->getLocale());
$hostel=\Modules\Hostel\Models\Hotel::find($booking->object_id);

$lang_local = app()->getLocale();
?>
<div class="b-panel-title">{{__('Hostel information')}}</div>
<div class="b-table-wrap">
    <table class="b-table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="label">{{__('Booking Number')}}</td>
            <td class="val">#{{$booking->id}}</td>
        </tr>
        <tr>
            <td class="label">{{__('Booking Status')}}</td>
            <td class="val">{{$booking->statusName}}</td>
        </tr>
        @if($booking->gatewayObj)
            <tr>
                <td class="label">{{__('Payment method')}}</td>
                <td class="val">{{$booking->gatewayObj->getOption('name')}}</td>
            </tr>
        @endif
        <tr>
            <td class="label">{{__('Hostel name')}}</td>
            <td class="val">
                <a href="{{$service->getDetailUrl()}}">{{$translation->title}}</a>
            </td>

        </tr>
        <tr>
            <td class="label">{{__('Owner name')}}</td>
            <td class="val">
                {{$hostel->owner}}
            </td>

        </tr>
        <tr>
            <td class="label">{{__('Phone')}}</td>
            <td class="val">
                {{$hostel->contact}}
            </td>

        </tr>
        <tr>
            @if($translation->address)
                <td class="label">{{__('Address')}}</td>
                <td class="val">
                    {{$translation->address}}
                </td>
            @endif
        </tr>
        @if($booking->start_date && $booking->end_date)
            <tr>
                <td class="label">{{__('Start date')}}</td>
                <td class="val">{{display_date($booking->start_date)}}</td>
            </tr>
            <tr>
                <td class="label">{{__('End date:')}}</td>
                <td class="val">
                    {{display_date($booking->end_date)}}
                </td>
            </tr>
            <tr>
                <td class="label">{{__('Days:')}}</td>
                <td class="val">
                    {{$booking->duration_nights}}
                </td>
            </tr>
        @endif

        @if($meta = $booking->getMeta('adults'))
            <tr>
                <td class="label">{{__('Adults')}}:</td>
                <td class="val">
                    <strong>{{$meta}}</strong>
                </td>
            </tr>
        @endif
        @if($meta = $booking->getMeta('children'))
            <tr>
                <td class="label">{{__('Children')}}:</td>
                <td class="val">
                    <strong>{{$meta}}</strong>
                </td>
            </tr>
        @endif
        <tr>
            <td class="label">{{__('Pricing')}}</td>
            <td class="val">
                <table class="pricing-list" width="100%">
                    @php $rooms = \Modules\Hostel\Models\HotelRoomBooking::getByBookingId($booking->id) @endphp
                    @if(!empty($rooms))
                        @foreach($rooms as $room)
                            <tr>
                                <td class="label">{{$room->room->title}} * {{$room->number}}
                                    :</td>
                                <td class="val no-r-padding">
                                    <strong>{{format_money($room->price * $room->number)}}</strong>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    @php $extra_price = $booking->getJsonMeta('extra_price')@endphp

                    @if(!empty($extra_price))
                        <tr>
                            <td colspan="2" class="label-title"><strong>{{__("Extra Prices:")}}</strong></td>
                        </tr>
                        <tr class="">
                            <td colspan="2" class="no-r-padding no-b-border">
                                <table width="100%">
                                    @foreach($extra_price as $type)
                                        <tr>
                                            <td class="label">{{$type['name']}}:</td>
                                            <td class="val no-r-padding">
                                                <strong>{{format_money($type['total'] ?? 0)}}</strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>

                    @endif

                    @if(!empty($booking->buyer_fees))
                        @php
                            $buyer_fees = json_decode($booking->buyer_fees , true);
                            foreach ($buyer_fees as $buyer_fee){
                                $fee_price = $buyer_fee['price'];
                                if(!empty($buyer_fee['type']) or $buyer_fee['type'] == "percent"){
                                    $fee_price = ( $booking->total_before_fees / 100 ) * $buyer_fee['price'];
                                }
                        @endphp
                        <tr>
                            <td class="label">
                                {{$buyer_fee['name_'.$lang_local] ?? $buyer_fee['name']}}
                                <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $buyer_fee['desc_'.$lang_local] ?? $buyer_fee['desc'] }}"></i>
                                @if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
                                    : {{$booking->total_guests}} * {{format_money( $fee_price )}}
                                @endif
                            </td>
                            <td class="val">
                                @if(!empty($buyer_fee['per_person']) and $buyer_fee['per_person'] == "on")
                                    {{ format_money( $fee_price * $booking->total_guests ) }}
                                @else
                                  
                                   {{ format_money( 1000 )}}
                                @endif 
                            </td>
                           
                        </tr>
                        @php } @endphp
                         @php
                         $taxamt=$booking->total_before_fees*0.18;
                      @endphp
                        <tr>
                            <td class="label">
                                Tax(18%)
                            </td>
                            <td class="val">
                                {{format_money($taxamt)}}

                            </td>
                        </tr>
                    @endif

                </table>
            </td>
        </tr>
        <tr>
        @php
                        $totalamt=$booking->total+$booking->total_before_fees*0.18;
                        
                    @endphp
           
            <td class="label fsz21">{{__('Total')}}</td>
            <td class="val fsz21"><strong style="color: #FA5636">{{format_money($totalamt)}}</strong></td>
        </tr>
        <tr>
            <td class="label fsz21">{{__('Paid')}}</td>
            <td class="val fsz21"><strong style="color: #FA5636">{{format_money($booking->paid)}}</strong></td>
        </tr>
        @if($booking->total > $booking->paid)
            <tr>
                <td class="label fsz21">{{__('Remain')}}</td>

                <td class="val fsz21"><strong style="color: #FA5636">{{format_money($totalamt - $booking->paid)}}</strong></td>
            </tr>
        @endif
    </table>
</div>
<div class="text-center mt20">
    <a href="{{ route("user.booking_history") }}" target="_blank" class="btn btn-primary manage-booking-btn">{{__('Manage Bookings')}}</a>
</div>
