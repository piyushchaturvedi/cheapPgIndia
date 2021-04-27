{{-- <div class="form-group">
    <i class="field-icon icofont-wall-clock"></i>
    <div class="form-content">
        <div class="form-date-search-hotel">
            <div class="date-wrapper">
                <div class="check-in-wrapper">
                    <label>{{ $field['title'] }}</label>
                    <div class="render check-in-render">{{Request::query('start',display_date(strtotime("today")))}}</div>
                    <span> - </span>
                    <div class="render check-out-render">{{Request::query('end',display_date(strtotime("+1 day")))}}</div>
                </div>
            </div>
            <input type="hidden" class="check-in-input" value="{{Request::query('start',display_date(strtotime("today")))}}" name="start">
            <input type="hidden" class="check-out-input" value="{{Request::query('end',display_date(strtotime("+1 day")))}}" name="end">
            <input type="text" class="check-in-out" name="date" value="{{Request::query('date',date("Y-m-d")." - ".date("Y-m-d",strtotime("+1 day")))}}">
        </div>
    </div>
</div> --}}
<div class="form-group">
    <i class="field-icon icofont-users"></i>
    <div class="form-content">
        <div class="form-date-search-hotel">
            <div class="date-wrapper">
                <div class="check-in-wrapper">
                    <label>{{ $field['title'] }}</label>
                    <select name="accomodation_for" id="accomodation_for" class="form-control">
                        <option value="">Select</option>
                        <option value="boy" {{request()->query('accomodation_for')=='boy'?'selected':''}}>Boy/Male</option>
                        <option value="girl" {{request()->query('accomodation_for')=='girl'?'selected':''}}>Girl/Female</option>
                        <option value="both" {{request()->query('accomodation_for')=='both'?'selected':''}}>Both (Boy/Girl)</option>
                        <option value="trans gender" {{request()->query('accomodation_for')=='trans gender'?'selected':''}}>Transgender</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
</div>