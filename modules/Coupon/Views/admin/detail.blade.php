@extends('admin.layouts.app')

@section('content')

    <form action="{{route('coupon.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ') .$translation->title :  __('Add new coupon') }}</h1>
                    @if($row->slug)
                        <p class="item-url-demo">{{ __('Permalink: ')}} {{ url((request()->query('lang') ? request()->query('lang').'/' : ''). config('page.page_route_prefix') )}}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
                        </p>
                    @endif
                </div>
                <div class="">
                    @if($row->slug)
                        <a class="btn btn-primary btn-sm" href="{{$row->getDetailUrl(request()->query('lang'))}}" target="_blank">{{ __('View page')}}</a>
                    @endif
                </div>
            </div>
            @include('admin.message')
            {{-- @if($row->id)
                @include('Language::admin.navigation')
            @endif --}}
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="panel-title">
                                <strong>{{ __('Coupon Content')}}</strong>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>{{ __('Code')}}</label>
                                    @php
                                        function random_strings($length_of_string)
                                        {
                                        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

                                        return substr(str_shuffle($str_result),
                                        0, $length_of_string);
                                        }

                                    @endphp
                                    <input type="text" value="{{$translation->code??random_strings(10)}}" placeholder="Code" name="code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Discount Percentage')}}</label>
                                    <div class="">
                                       <input type="number" name="percentage" class="form-control" id="percentage" min="0" max="100" value="{{$translation->percentage}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Coupon Description')}}</label>
                                    <div class="">
                                        <textarea name="description" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Expiry Date')}}</label>
                                    <div class="">
                                        <input type="date" name="expiry_date" class="form-control" id="expiry_date" value="{{$translation->expiry_date?date('Y-m-d',strtotime($translation->expiry_date)):''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Number of Users')}}</label>
                                    <div class="">
                                       <input type="number" name="usage_limit" class="form-control" id="percentage" min="0" max="500" value="{{$translation->usage_limit}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Publish')}}</strong></div>
                            <div class="panel-body">
                                @if(is_default_lang())
                                <div>
                                    <label><input @if($row->status=='active') checked @endif type="radio" name="status" value="active"> {{__("Active")}}
                                    </label></div>
                                <div>
                                    <label><input @if($row->status=='inactive') checked @endif type="radio" name="status" value="inactive"> {{__("Inactive")}}
                                    </label></div>
                                @endif
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section ('script.body')
@endsection
