{{-- <div class="form-group">
    <label>{{__("Name")}}</label>
    <input type="text" value="{{$translation->name}}" placeholder="{{__("Location name")}}" name="name" class="form-control">
</div> --}}
<div class="form-group">
    <label>{{__("State")}}</label>
    <select name="state_id" id="state_id" class="form-control">
        <option value="">{{__("-- Please Select --")}}</option>
        @foreach ($states as $state)
        <option value="{{$state->id}}" @if($state->id==$row->state_id) selected @endif>{{$state->name}}</option>
        @endforeach

    </select>

</div>
<div class="form-group">
    <label>{{__("City")}}  {{__("Name")}}</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
    {{-- <select name="name" id="city" class="form-control">
        <option value="">{{__("-- Please Select --")}}</option>
        @if(!empty($cities)):
        @foreach ($cities as $city)
        <option value="{{$city->name}}" @if($city->name==$translation->name) selected @endif>{{$city->name}}</option>
        @endforeach
        @endif

    </select> --}}

</div>
@if(is_default_lang())
    <div class="form-group">
        <label>{{__("Parent")}}</label>
        <select name="parent_id" class="form-control">
            <option value="">{{__("-- Please Select --")}}</option>
            <?php
            $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                foreach ($categories as $category) {
                    if ($category->id == $row->id) {
                        continue;
                    }
                    $selected = '';
                    if ($row->parent_id == $category->id)
                        $selected = 'selected';
                    printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                    $traverse($category->children, $prefix . '-');
                }
            };
            $traverse($parents);
            ?>
        </select>
    </div>
@endif
<div class="form-group">
    <label class="control-label">{{__("Description")}}</label>
    <div class="">
        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->content}}</textarea>
    </div>
</div>
