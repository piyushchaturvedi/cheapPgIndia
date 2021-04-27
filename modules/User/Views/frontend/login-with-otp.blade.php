@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bravo-login-form-page bravo-login-page">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login Via OTP') }}</div>
                    <div class="card-body">
                        <form method="POST" id="form_otp" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="" required autofocus>

                                </div>
                                <div class="col-md-3"><button type="button" class="btn_submit btn btn-warning btn-md"><i class="fa fa-bell"></i> Send OTP</button></div>
                            </div>
                            <p id="err_msg"></p>
                            @if (isset($error))
                            <p class="text-danger">{{$error}}</p>

                            @endif

                            <div id="btn_action" style="display: none;">
                            <div class="form-group row" >
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Enter OTP') }}</label>
                                <div class="col-md-6">
                                <input type="number" name="otp" id="otp" class="form-control" ></div>
                                <div class="col-md-3"><button  type="button" class="btn_submit btn btn-danger btn-md"><i class="fa fa-refresh"></i> Resend</button></div>
                                </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Varify and Login') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
<script>

$(document).on('click','.btn_submit',function(){
var phone=$('#phone').val();
var thisBtn=$(this);
var post_url='{{route("auth.send_otp")}}';
$.ajax({
    type: "POST",
    url: post_url,
    data: {
    'phone':phone,
    "_token": "{{ csrf_token() }}",
    },
    success: function(data){
        var res=JSON.parse(data)
        if(res.status_code===1){
            $('#btn_action').show();
            $(thisBtn).hide();
            $('#err_msg').hide();
            $('#form_otp').addAttr('action','{{route('auth.loginWithOTP')}}');
        }
        else
        {
            $('#btn_action').hide();
            $('#err_msg').addClass('text-danger');
            $('#err_msg').text('Invalid Phone Number.');
        }

    }
});
});

$(document).ready(function(){
    $("form").submit(function(e){

        e.preventDefault();
var phone=$('#phone').val();
var post_url='{{route("auth.loginWithOTP")}}';
var otp=$('#otp').val();
if(otp!='')
{
    $.ajax({
    type: "POST",
    url: post_url,
    data: {
    'phone':phone,
    "_token": "{{ csrf_token() }}",
    "otp":otp
    },
    success: function(data){
        var res=JSON.parse(data)
        if(res.status_code===1){
            window.location.href='{{route('index.home')}}';

        }
        else
        {
            $('#btn_action').hide();
            $('#err_msg').addClass('text-danger');
            $('#err_msg').text('Invalid Phone Number.');
        }

    }
});
}

    });

});
</script>
@endsection
