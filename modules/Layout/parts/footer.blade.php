@if(!is_api())

	<div class="bravo_footer">

		<div class="mailchimp">

			<div class="container">

				<div class="row">

					<div class="col-xs-12 col-lg-10 col-lg-offset-1">

						<div class="row">

							<div class="col-xs-12  col-md-7 col-lg-6">

								<div class="media ">

									<div class="media-left hidden-xs">

										<i class="icofont-island-alt"></i>

									</div>

									<div class="media-body">

										<h4 class="media-heading">{{__("Get Updates & More")}}</h4>

										<p>{{__("Thoughtful thoughts to your inbox")}}</p>

									</div>

								</div>

							</div>

							<div class="col-xs-12 col-md-5 col-lg-6">

								<form action="{{route('newsletter.subscribe')}}" class="subcribe-form bravo-subscribe-form bravo-form">

									@csrf

									<div class="form-group">

										<input type="text" name="email" class="form-control email-input" placeholder="{{__('Your Email')}}">

										<button type="submit" class="btn-submit">{{__('Subscribe')}}

											<i class="fa fa-spinner fa-pulse fa-fw"></i>

										</button>

									</div>

									<div class="form-mess"></div>

								</form>



							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="main-footer">

			<div class="container-fluid">

				<div class="row footerapp">
					<div class="col-lg-6 col-md-6"><h4><img src="http://cloud18.info/demo/cheap-pg-booking/version-2/public/uploads/0000/1/2021/01/23/cheap-pgin.png" alt="Cheap PG Booking" width="150px">Feel Like Home</h4></div>
					<div class="col-lg-6 col-md-6"><h4 class="pull-right">Join our network and grow your business!</h4></div>
				</div>

				<div class="row footerapp">
					<div class="col-lg-6 col-md-6">
						<h4>Download Cheap PG India app for exciting offers.</h4>
						<a href="#"><img src="http://cloud18.info/demo/cheap-pg-booking/version-2/public/images/appleplay.png" alt="Cheap PG Booking" width="150px"></a>
						<a href="#"><img src="http://cloud18.info/demo/cheap-pg-booking/version-2/public/images/googleplay.png" alt="Cheap PG Booking" width="150px"></a>
					</div>
					<div class="col-lg-2 col-md-2">
						<ul>

						    <li><a href="http://cloud18.info/demo/cheap-pg-booking/version-4/public/page/about-us">About Us</a></li>
						    <li><a href="#">Teams / Careers</a></li>
						    <li><a href="#">Blogs</a></li>
						    <li><a href="#">Support	</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-2">
						<ul>
						    <li><a href="#">Official Cheap PG Blog</a></li>
						    <li><a href="#">Press Kit</a></li>
						    <li><a href="#">Cheap PG Circle</a></li>
						    <li><a href="#">Cheap PG Frames</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-2">
						<ul>
						    <li><a href="#">Terme and Conditions</a></li>
						    <li><a href="#">Guest Policies</a></li>
						    <li><a href="#">Privacy Policy</a></li>
						    <li><a href="#">Responsible Disclosure</a></li>
						</ul>
					</div>
				</div>

				<div class="row footerapp">
					<div class="col-lg-4 col-md-4 text-center">
						<h4>Cheap PG Townhouse</h4>
						<p>Your Friendly Neighbourhood Hostels</p>
					</div>
					<div class="col-lg-4 col-md-4 text-center">
						<h4>Cheap PG SilverKey</h4>
						<p>Executive Stays</p>
					</div>
					<div class="col-lg-4 col-md-4 text-center">
						<h4>Cheap PG HOME</h4>
						<p>Unlocking Homes</p>
					</div>
				</div>

				<div class="row footerapp">
					<div class="col-lg-12 col-md-12"><h4>Cheap PG Hostels</h4></div>
					<div class="col-lg-12 col-md-12">
						<ul class="row">
							@foreach (\DB::table('bravo_locations')->select(['id','name'])->where('deleted_at',NULL)->orderBy('name')->get() as $item)
							<li class="col-lg-2 col-md-2"><a href="hostel?location_id={{$item->id}}">Hostels in {{$item->name}}</a></li>
							@endforeach

						    {{-- <li class="col-lg-2 col-md-2"><a href="#">Hotels in Manali</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Nainital</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Mount Abu</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Agra</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Haridwar</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Gurgaon</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Coimbatore</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Cheap PG Hotel UK</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels near me</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Manali</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Nainital</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Mount Abu</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Agra</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Haridwar</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Gurgaon</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Coimbatore</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Cheap PG Hotel UK</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels near me</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Manali</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Nainital</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Mount Abu</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Agra</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Haridwar</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Gurgaon</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Coimbatore</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Cheap PG Hotel UK</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels near me</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Manali</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Nainital</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Mount Abu</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Agra</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Haridwar</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Gurgaon</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Coimbatore</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Cheap PG Hotel UK</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels near me</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Manali</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Nainital</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Mount Abu</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Agra</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Haridwar</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Gurgaon</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Coimbatore</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Cheap PG Hotel UK</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels near me</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Manali</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Nainital</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Mount Abu</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Agra</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Haridwar</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Gurgaon</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Hotels in Coimbatore</a></li>
						    <li class="col-lg-2 col-md-2"><a href="#">Cheap PG Hotel UK</a></li> --}}
						</ul>
					</div>
				</div>

				{{-- <div class="row">

					@if($list_widget_footers = setting_item_with_lang("list_widget_footer"))

                        <?php $list_widget_footers = json_decode($list_widget_footers); ?>

						@foreach($list_widget_footers as $key=>$item)

							<div class="col-lg-{{$item->size ?? '3'}} col-md-6">

								<div class="nav-footer">

									<div class="title">

										{{$item->title}}

									</div>

									<div class="context">

										{!! $item->content  !!}

									</div>

								</div>

							</div>

						@endforeach

					@endif

				</div> --}}

			</div>

		</div>

		<div class="copy-right">

			<div class="container-fluid context">

				<div class="row">

					<div class="col-md-12">

						{!! setting_item_with_lang("footer_text_left") ?? ''  !!}

						<div class="f-visa">

							{!! setting_item_with_lang("footer_text_right") ?? ''  !!}

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

@endif

<style type="text/css">
	.bravo_footer {
        background-color: #6D787D;
     }
    .footer-header {
       /*display: -ms-flexbox;
       display: flex;
       -ms-flex-pack: justify;
       justify-content: space-between;
       -ms-flex-align: center;
       align-items: center;*/
       padding: 24px 30px;
     }
    .fheaderright, .fheaderleft {
       /*display: flex;
       align-items: center;*/
       color: #ffffff;
       font-size: 24px;
     }
     .borderbtm{ border-bottom: 1px solid hsla(0,0%,100%,.5); }
     .footerapp {
		margin: 0;
		padding: 30px 10px!important;
		border-bottom: 1px solid hsla(0,0%,100%,.5);
		box-sizing: border-box;
	 }
	 .footerapp h4{ color: #ffffff; font-size: 20px; font-weight: 400; line-height: 66px; height: auto; }
	 .footerapp p{ color: #ffffff; font-size: 14px; }
	 .footerapp ul{}
	 .footerapp ul li{ list-style: none; }
	 .footerapp ul li a{ color: #ffffff; font-size: 14px; font-weight: 300; padding: 6px 0; display: block; }
</style>



@include('Layout::parts.login-register-modal')

@include('Layout::parts.chat')

@if(Auth::id())

	@include('Media::browser')

@endif

<link rel="stylesheet" href="{{asset('libs/flags/css/flag-icon.min.css')}}">



{!! \App\Helpers\Assets::css(true) !!}



{{--Lazy Load--}}

<script src="{{asset('libs/lazy-load/intersection-observer.js')}}"></script>

<script async src="{{asset('libs/lazy-load/lazyload.min.js')}}"></script>

<script>

    // Set the options to make LazyLoad self-initialize

    window.lazyLoadOptions = {

        elements_selector: ".lazy",

        // ... more custom settings?

    };



    // Listen to the initialization event and get the instance of LazyLoad

    window.addEventListener('LazyLoad::Initialized', function (event) {

        window.lazyLoadInstance = event.detail.instance;

    }, false);





</script>

<script src="{{ asset('libs/lodash.min.js') }}"></script>

<script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>

<script src="{{ asset('libs/vue/vue.js') }}"></script>

<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>

@if(Auth::id())

	<script src="{{ asset('module/media/js/browser.js?_ver='.config('app.version')) }}"></script>

@endif

<script src="{{ asset('libs/carousel-2/owl.carousel.min.js') }}"></script>

<script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>

<script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>

<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('js/functions.js?_ver='.config('app.version')) }}"></script>



@if(setting_item('inbox_enable'))

	<script src="{{ asset('module/core/js/chat-engine.js?_ver='.config('app.version')) }}"></script>

@endif



@if(

    setting_item('tour_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('car_location_search_style')=='autocompletePlace' || setting_item('space_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('event_location_search_style')=='autocompletePlace'

)

	{!! App\Helpers\MapEngine::scripts() !!}

@endif



<script src="{{ asset('js/home.js?_ver='.config('app.version')) }}"></script>



@if(!empty($is_user_page))

	<script src="{{ asset('module/user/js/user.js?_ver='.config('app.version')) }}"></script>

@endif

@if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api())

	<div class="booking_cookie_agreement p-3 d-flex fixed-bottom">

		<div class="content-cookie">{!! setting_item_with_lang('cookie_agreement_content') !!}</div>

		<button class="btn save-cookie">{!! setting_item_with_lang('cookie_agreement_button_text') !!}</button>

	</div>

	<script>

        var save_cookie_url = '{{route('core.cookie.check')}}';

	</script>

	<script src="{{ asset('js/cookie.js?_ver='.config('app.version')) }}"></script>


@endif



{!! \App\Helpers\Assets::js(true) !!}



@yield('footer')



@php \App\Helpers\ReCaptchaEngine::scripts() @endphp

