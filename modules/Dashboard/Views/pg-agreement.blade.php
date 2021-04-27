@extends('admin.layouts.app')
@section('content')
    <h2 class="title-bar">
        {{__("Agreement")}}
    </h2>
    @include('admin.message')
    <form action="{{route('user.profile.update')}}" method="post" class="input-has-icon">
        @csrf
        <div class="container-fluid">
            <div class="row mt-3">
                {{-- <script>
                    window.print();
                </script>id="invoice-print-zone" --}}

                <div class="col-md-7 col-lg-7 pr-5 pl-5 fixheight"  id="printableArea">
                    <div class="row">
                        <div class="col-md-3"><img src="{{asset('uploads/logo.png')}}" alt=""></div>
                        <div class="col-md-9 text-center">
                            <h3>PGIN INDIA PVT. LTD.</h3>
                            <p>Sai mangal building Office no 402,403,404,405 inside malad shopping centre ,<br>
                            Malad- West, Mumbai- 400064, Maharashtra, India<br>
                            Mobile No.: 7387444643, 9766925326<br>
                            Email Id.:support@cheappginindia.com<br>
                            COMPANY CIN NO – U74999MH2018PTC309353</p>
                        </div>
                    </div>
                    <h5 class="text-center">PAYING GUEST Agreement</h5>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group row">
                              <label for="ownername" class="col-sm-3 col-form-label">AND Person Name:</label>
                              <div class="col-sm-9">
                                <p class="col-form-label" id="guest_name"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="ownername" class="col-sm-3 col-form-label">Aadhar No:</label>
                                <div class="col-sm-9">
                                  <p class="col-form-label" id="p_aadhar"></p>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ownername" class="col-sm-3 col-form-label">Aadhar Address:</label>
                                <div class="col-sm-9">
                                    <p class="col-form-label" id="p_address"></p>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ownername" class="col-sm-3 col-form-label">Re: One room in Flat No:</label>
                                <div class="col-sm-9">
                                    <p class="col-form-label" id="span_flat_no2"></p>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="{{asset('uploads/square.png')}}" alt="" width="150" height="150">
                            <p>Applicant Sign.</p>
                        </div>
                    </div>
                    <p>
                        AGREEMENT made at <span id="a1">{{date('d M, Y')}}</span> this <span id="a2"></span> day of <span id="a3"></span> 2020-21 BETWEEN Mr.
                        <span id="span_owner_name"></span> hereinafter referred to as "the Owner" of the One Part AND (i) MS CHEAP PGIN INDIA PVT.LTD and (ii)
                        <span id="guest_name2"></span> hereinafter referred to as "the Paying Guest" of the Second Part;
                        WHEREAS the Owner is seized and possessed of and is occupying Flat No.<span id="span_flat_no"></span> on the <span id="span_floor_no"></span>
                         floor of the building named and known as  <span id="span_property_name"></span> situated at  <span id="span_property_address"></span>;
                    </p>
                    <p>
                        AND WHEREAS the Paying Guest have requested the Owner to
                         allow them use of one bedroom in the flat in the aforesaid premises for their own use only on a temporary basis
                         on the terms and conditions hereinafter written.
                    </p>
                    <h5>NOW THIS AGREEMENT WITNESSETH:</h5>
                    <ol type="1">
                        <li><p>The Owner hereby agrees to permit the Paying Guest to use one bedroom in the aforesaid premises being Flat No.
                            <span id="span_flat_no3"></span> in <span id="span_property_name2"></span> situated at <span id="span_property_address2"></span>
                            together with the use of the attached bathroom, on paying guest basis.</p></li>
                        <li><p>This Paying Guest Agreement shall be for a period of <span id="span_no_of_months"></span>s only commencing from <span id="span_start_date"></span>.</p></li>
                        <li><p>The Paying Guest shall pay an amount of <span id="span_amount"></span> (Rupees only) for every month (One month).
                             The charges shall include the use of bathroom, and other incidentals and society charges.
                              The Paying Guest have agreed to pay the entire electricity bill, less an amount of Rs.200/- (Rupees two hundred)
                              per month.</p></li>
                        <li><p>The Paying Guest have paid at the time of execution hereof a security deposit of Rs.<span id="span_security_deposit"></span>
                             (Rupees only) which shall remain with the Owner free of interest, until the termination of this agreement,
                             and shall be returned to the Paying Guest, subject to any deduction for payments due hereunder.
                              The Paying Guest shall pay a further sum of Rs.<span id="span_amount2"></span> (Rupees only) as Security Deposit on or before
                              <span id="span_warning_date"></span>.</p></li>
                        <li><p>The Owner may allot to the Paying Guest any of the bedrooms in the said flat
                            for the use of the Paying Guest and the Owner may change the allocation at any time during the pendency of the Agreement.</p></li>
                        <li><p>The Paying Guest hereby specifically confirm and agree that they have no right whatsoever
                            to the said premises nor shall claim to be tenant/sub-tenant or licensees nor shall claim
                            any other right whatsoever in or to the said premises.</p></li>
                        <li><p>It is clearly agreed and understood that the Paying Guest have not been given any key to the entrance
                            door of the flat nor even to the room that is allocated to them for their temporary use from time to time.</p></li>
                        <li><p>They Paying Guest may use the passages in the flat for access to the room and may use the kitchen
                            for cooking their own food only provided that no disturbance whatsoever is caused to the use of the kitchen
                            and passages and other portions of the flat by the Owner and his servants and others.</p></li>
                        <li><p>The Paying Guest shall not cause any disturbance at any time and may permit guests
                            or any outsider to enter the flat only with the permission of the Owner.</p></li>
                        <li><p>In the event that the Paying Guest misuse any of the facilities in the flat or
                            causes any disturbance or delays in making payment of the Paying Guest charges, this Agreement shall stand terminated forthwith and it
                             is hereby specifically agreed and confirmed that the Owner shall be entitled to enter the room allocated to the Paying
                             Guest for the time being and to remove all the belongings of the Paying Guest and dispose of them.</p></li>
                        <li><p>This Agreement shall stand terminated immediately upon the expiry of the period mentioned hereinabove.</p></li>
                        <li><p>The Paying Guest shall be responsible for any damage caused by them or by any other outsider
                            who has entered the flat through them to the said flat and to any of the furniture, fixtures and equipment therein,
                             reasonable wear and tear excepted.</p></li>
                    </ol>
                    <div class="text-center">
                        <h3>CHEAP PGIN INDIA PVT. LTD.</h3>
                        <p>R E C E I P T</p>
                    </div>
                    <p>
                        Received this day the sum of Rs._____________ (Rupees ______________________ only) by cheque bearing No. ____________ and Rs.______________
                        (Rupees _________________________________________ only) by Cheque bearing No. _______________dated _____________ both drawn on _________________
                         Bank ___________________ Branch from Mr. ________________________ and Mrs._____________________________,
                         the Paying Guests towards security deposit.
                    </p>
                    <h5>WE SAY RECEIVED</h5>
                    <p>
                        Mr. ___________________________<br><br>
                        Payment once received is non refundable in any circumstances.<br><br>

                        Please submit your KYC Documents along with passport size Photo.
                    </p>
                    <div class="row mt-5">
                        <div class="col-md-6"><h5>TENANT SIGNATURE</h5></div>
                        <div class="col-md-6 text-right"><h5>COMPANY SEAL</h5></div>
                    </div>
                </div>
            <div class="col-md-5 col-lg-5 pr-5 pl-5 fixheight">
                <p class="text-center mt-5 mb-3">
                    Create Rental Agreement and get it delivered to your Home!<br>

                </p>
                <form>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" id="location">
                                  <option>Agreement City</option>
                                  @foreach ($locations as $item)
                                      <option value="{{$item->name}}">{{$item->name}}</option>
                                  @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option value="" disabled="" selected="">Select Contact Person</option>
                                    <option value="landlord" selected="">Landlord</option>
                                    <option value="tenant">Tenant</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <input class="form-control" type="text" id="owner_name" placeholder="Owner Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="guest_name" placeholder="Guest Name">
                    </div>
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" id="email" placeholder="Guest Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="mobile" placeholder="Guest Mobile">
                    </div> --}}
                    <div class="form-group">
                        <input class="form-control" type="text" id="aadhar" placeholder="Guest Aadhar">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="guest_address" placeholder="Guest Address">
                    </div>
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" id="tenant_name" placeholder="Tenant Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="tenant_mobile" placeholder="Telant Mobile">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="tenant_email" placeholder="Telant Email">
                    </div> --}}
                    <div class="form-group">
                        <input class="form-control" type="text" id="flat_no" placeholder="Flat No.">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="floor_no" placeholder="Floor No.">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="property_name" placeholder="Property Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="property_address" placeholder="Property Address">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="no_of_months">
                          <option value="" disabled="" selected="">No of Months</option>
                          @for ($i = 1; $i < 12; $i++)
                          <option value="{{$i}} month" >{{$i}} Months</option>
                          @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" id="start_date" placeholder="Start Date">
                    </div>
                    {{-- <div class="form-group">
                        <input class="form-control" type="date" id="end_date" placeholder="End Date">
                    </div> --}}
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" id="total_duration" placeholder="Total duration Months">
                    </div> --}}
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" id="deposit_amount" placeholder="Deposit Amount">
                    </div> --}}
                    <div class="form-group">
                        <input class="form-control" type="text" id="rent_fee" placeholder="Rent Fee">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="security_deposit" placeholder="Security Deposit">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" id="warning_date" placeholder="Warning Date">
                    </div>

                    {{-- <p>I require additional services (charges not included in the price.)</p> --}}

                    {{-- <p class="text-center mt-4 mb-3">You can edit these fields even after payment</p> --}}
                    {{-- <div class="totalFees">
                        Total Fees : <i class="fa fa-inr" aria-hidden="true"></i> 479
                    </div> --}}
                    <div class="text-center">
                        <button type="button" onclick="printDiv('printableArea')" class="btn btn-primary">Generate Agreement</button>
                        {{-- <p>In case of any query call us on +91 9243012802.</p> --}}
                        {{-- <a href="#">How it works?</a> --}}
                    </div>
                </form>
            </div>
        </div>
        </div>
    </form>
@endsection

@section('script.body')
<script>
     $(document).on('keyup','#owner_name',function(){
        $('#span_owner_name').text($(this).val());
    });
    $(document).on('keyup','#guest_name',function(){
        $('#guest_name').text($(this).val());
        $('#guest_name2').text($(this).val());
    });
    // $(document).on('keyup','#guest_name',function(){
    //     $('#guest_name2').text($(this).val());
    // });
    $(document).on('keyup','#email',function(){
        $('#p_email').text($(this).val());
    });
    $(document).on('keyup','#mobile',function(){
        $('#p_mobile').text($(this).val());
    });
    $(document).on('keyup','#guest_address',function(){
        $('#p_address').text($(this).val());
    });
    $(document).on('keyup','#aadhar',function(){
        $('#p_aadhar').text($(this).val());
    });
    $(document).on('change','#location',function(){
        $('#p_for_landlord_location').text($(this).val());
    });
    $(document).on('keyup','#tenant_name',function(){
        $('#span_for_tenannt').text($(this).val());
    });
    $(document).on('change','#no_of_months',function(){
        $('#span_no_of_months').text($(this).val());
    });
    $(document).on('change','#start_date',function(){
        $('#span_start_date').text($(this).val());
    });
    $(document).on('change','#end_date',function(){
        $('#span_end_date').text($(this).val());
    });
    $(document).on('keyup','#registration_fee',function(){
        $('#span_registration_fee').text($(this).val());
    });
    $(document).on('keyup','#security_deposit',function(){
        $('#span_security_deposit').text($(this).val());
    });
    $(document).on('keyup','#property_name',function(){
        $('#span_property_name').text($(this).val());
    });
    $(document).on('keyup','#property_address',function(){
        $('#span_property_address').text($(this).val());
    });
    $(document).on('keyup','#flat_no',function(){
        $('#span_flat_no').text($(this).val());
        $('#span_flat_no2').text($(this).val());
        $('#span_flat_no3').text($(this).val());
    });
    $(document).on('keyup','#floor_no',function(){
        $('#span_floor_no').text($(this).val());
    });
    $(document).on('change','#warning_date',function(){
        $('#span_warning_date').text($(this).val());
    });
    $(document).on('keyup','#rent_fee',function(){
        $('#span_amount').text($(this).val());
        $('#span_amount2').text($(this).val());
    });

    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection
