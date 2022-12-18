
<div class="form-group {{ $errors->has('Link_instagram') ? 'has-error' : '' }}">
    <label for="Link_instagram" class="col-md-2 control-label">{{ trans('settings.Link_instagram') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Link_instagram" type="text" id="Link_instagram" value="{{ old('Link_instagram', optional($settings)->Link_instagram) }}" minlength="1" placeholder="{{ trans('settings.Link_instagram__placeholder') }}">
        {!! $errors->first('Link_instagram', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Link_contact') ? 'has-error' : '' }}">
    <label for="Link_contact" class="col-md-2 control-label">{{ trans('settings.Link_contact') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Link_contact" type="text" id="Link_contact" value="{{ old('Link_contact', optional($settings)->Link_contact) }}" minlength="1" placeholder="{{ trans('settings.Link_contact__placeholder') }}">
        {!! $errors->first('Link_contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Link_android') ? 'has-error' : '' }}">
    <label for="Link_android" class="col-md-2 control-label">{{ trans('settings.Link_android') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Link_android" type="text" id="Link_android" value="{{ old('Link_android', optional($settings)->Link_android) }}" minlength="1" placeholder="{{ trans('settings.Link_android__placeholder') }}">
        {!! $errors->first('Link_android', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Link_ios') ? 'has-error' : '' }}">
    <label for="Link_ios" class="col-md-2 control-label">{{ trans('settings.Link_ios') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Link_ios" type="text" id="Link_ios" value="{{ old('Link_ios', optional($settings)->Link_ios) }}" minlength="1" placeholder="{{ trans('settings.Link_ios__placeholder') }}">
        {!! $errors->first('Link_ios', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Link_facebook') ? 'has-error' : '' }}">
    <label for="Link_facebook" class="col-md-2 control-label">{{ trans('settings.Link_facebook') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Link_facebook" type="text" id="Link_facebook" value="{{ old('Link_facebook', optional($settings)->Link_facebook) }}" minlength="1" placeholder="{{ trans('settings.Link_facebook__placeholder') }}">
        {!! $errors->first('Link_facebook', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('produit_user') ? 'has-error' : '' }}">
    <label for="produit_user" class="col-md-2 control-label">{{ trans('settings.produit_user') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="produit_user" type="number" id="produit_user" value="{{ old('produit_user', optional($settings)->produit_user) }}" minlength="1" placeholder="">
        {!! $errors->first('produit_user', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group {{ $errors->has('Terms_Condition_ar') ? 'has-error' : '' }}">
    <label for="Terms_Condition_ar" class="col-md-2 control-label">{{ trans('settings.Terms_Condition_ar') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" style="    margin: 0px 0px 0px -11.1719px;
    height: 160px;
    width: 788px;" name="Terms_Condition_ar" type="text" id="Terms_Condition_ar" value="{{ old('Terms_Condition_ar', optional($settings)->Terms_Condition_ar) }} {{$settings->Terms_Condition_ar}}" minlength="1" placeholder="{{ trans('settings.Terms_Condition_ar__placeholder') }}">{{$settings->Terms_Condition_ar}}</textarea>
        {!! $errors->first('Terms_Condition_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Terms_Condition_eg') ? 'has-error' : '' }}">
    <label for="Terms_Condition_eg" class="col-md-2 control-label">{{ trans('settings.Terms_Condition_eg') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" style=" direction: ltr;   margin: 0px 0px 0px -11.1719px;
    height: 160px;    width: 788px;" name="Terms_Condition_eg" type="text" id="Terms_Condition_eg" value="{{ old('Terms_Condition_eg', optional($settings)->Terms_Condition_eg) }} " minlength="1" placeholder="{{ trans('settings.Terms_Condition_eg__placeholder') }}">{{$settings->Terms_Condition_eg}}</textarea>
        {!! $errors->first('Terms_Condition_eg', '<p class="help-block">:message</p>') !!}
    </div>
</div>



