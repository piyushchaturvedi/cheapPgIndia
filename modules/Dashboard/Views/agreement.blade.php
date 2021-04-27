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

            <div class="col-md-7 col-lg-7 pr-5 pl-5 fixheight" id="printableArea" >
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
                <h5 class="text-center">Owners’ Contract</h5>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                          <label for="ownername" class="col-sm-3 col-form-label">Name of the Owner:</label>
                          <div class="col-sm-9">
                            <p class="col-form-label" id="p_for_landlord_name"></p>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="ownername" class="col-sm-3 col-form-label">Contact No:</label>
                            <div class="col-sm-9">
                              <p class="col-form-label" id="p_for_landlord_mobile"></p>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="ownername" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <p class="col-form-label" id="p_for_landlord_email"></p>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="ownername" class="col-sm-3 col-form-label">Aadhar Card No:</label>
                            <div class="col-sm-9">
                                <p class="col-form-label" id="p_for_landlord_aadhar"></p>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="ownername" class="col-sm-3 col-form-label">Permanent Address:</label>
                            <div class="col-sm-9">
                                <p class="col-form-label" id="p_for_landlord_location"></p>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="{{asset('uploads/square.png')}}" alt="" width="150" height="150">
                        <p>(Please paste your photo and sign across the photograph)</p>
                    </div>
                </div>
                <p>AGREEMENT made at <span id="span_today_date">{{date('d M, Y')}}</span> this <span id="a2"></span> day of <span id="a3"></span> 2020-2021 BETWEEN MS CHEAP PGIN INDIA PVT.LTD hereinafter referred to as "the Owner" of the One Part AND (i) Mr. ___<span id="span_for_tenannt"></span> ___ hereinafter referred to as "CPI" of the Second Part (ii).<br><br>

                    WHEREAS the Owner has approached CPI Hostels to give I- PG (Individual PG) services  for their existing premises mentioned herein, Flat No.<span id="span_flat_no"></span> on the <span id="span_floor_no"></span> floor of the building named and known as ____ <span id="span_property_name"></span>
                     _______ situated at ____________________ <span id="span_property_address"></span> _____________;<br><br>

                    AND WHEREAS CPI Hostels have accepted to provide its I-PG services to the Owner by providing the owner with tenants for their PG accommodation at the aforesaid premises on the terms and conditions mentioned here after:
                </p>
                <h5>NOW THIS AGREEMENT WITNESSETH:</h5>
                <ol type="1">
                    <li><p>The Owner hereby agrees to permit the Paying Guest to use bedspaces in the aforesaid premises together with the use of the bathroom, kitchen and basic amenities such as electricity, water, Wifi, Gas etc. on rental basis.</p></li>
                    <li><p>This Agreement shall be for a period of <span id="span_no_of_months"></span>s only commencing from <span id="span_start_date"></span> till <span id="span_end_date"></span>.</p></li>
                    <li><p>CPI-Hostels will provide the Owner with company accessories such as beds, mattresses, bedsheets, pillow covers, blankets (whichever not available with the Owner).</p></li>
                    <li><p>The Owner shall pay a registration fee of <span id="span_registration_fee"></span> (Rupees only) for empanelment with CPI- Hostels. The charges include the licensing cost along with the processing fees. Products provided will be charged extra.</p></li>
                    <li>
                        <p>The Owner will charge the I-PG an 25% Charges by CPI) and a security deposit amount As per the rental amount
                        Rs. <span id="span_security_deposit"></span> ( Rupees) which shall remain with the Owner free of interest,
                        until the termination of the I-PG agreement, and shall be returned to the I-PG, subject to any deduction for payments due hereunder.
                        </p>
                    </li>
                    <li><p>The Owner may allot to the Individual Paying Guest any of the bedspaces in the said flat for the use of Paying Guest facility and the Owner may change the allocation at any time during the pendency of the Agreement.</p></li>
                    <li><p>The I-PG hereby shall specifically confirm and agree that they have no right whatsoever to the said premises nor shall claim to be tenant/sub-tenant or licensees nor shall claim any other right whatsoever in or to the said premises.</p></li>
                    <li><p>CPI Hostels authorize the owner to collect the monthly rent from the I-PG’s according to the admission dates defined by the Owner.</p></li>
                    <li><p>In the event that the I-PG’s faces any problem from the Owner or his/her management and vice-a –versa CPI will not be responsible for anything.</p></li>
                    <li><p>The Owner will be responsible for the I-PG’s document and background verification including Police verification. </p></li>
                    <li><p>This Agreement shall stand terminated immediately upon the expiry of the period mentioned hereinabove.</p></li>
                </ol>
                <div class="row mt-5">
                    <div class="col-md-6"><h5>OWNER COMPANY SEAL</h5></div>
                    <div class="col-md-6 text-right"><h5>COMPANY SEAL</h5></div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 pr-5 pl-5 fixheight">
                <p class="text-center mt-5 mb-3">
                    Create Rental Agreement and get it delivered to your Home!<br>
                    In case of any query call us on +91 9243012802
                </p>
                <form>
                    <div class="row">
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
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="landlord_name" placeholder="Owner Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="landlord_email" placeholder="Owner Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="landlord_mobile" placeholder="Owner Mobile">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="landlord_aadhar" placeholder="Owner Aadhar">
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
                    <div class="form-group">
                        <input class="form-control" type="date" id="end_date" placeholder="End Date">
                    </div>
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" id="total_duration" placeholder="Total duration Months">
                    </div> --}}
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" id="deposit_amount" placeholder="Deposit Amount">
                    </div> --}}
                    <div class="form-group">
                        <input class="form-control" type="text" id="registration_fee" placeholder="Registration Fee">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="security_deposit" placeholder="Security Deposit">
                    </div>

                    <p>I require additional services (charges not included in the price.)</p>

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
    $(document).on('keyup','#landlord_name',function(){
        $('#p_for_landlord_name').text($(this).val());
    });
    $(document).on('keyup','#landlord_email',function(){
        $('#p_for_landlord_email').text($(this).val());
    });
    $(document).on('keyup','#landlord_mobile',function(){
        $('#p_for_landlord_mobile').text($(this).val());
    });
    $(document).on('keyup','#landlord_aadhar',function(){
        $('#p_for_landlord_aadhar').text($(this).val());
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
    });
    $(document).on('keyup','#floor_no',function(){
        $('#span_floor_no').text($(this).val());
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
