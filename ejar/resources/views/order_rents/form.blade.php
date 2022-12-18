<div class="form-group {{ $errors->has('datestart') ? 'has-error' : '' }}">
    <label for="datestart" class="col-md-2 control-label">{{ trans('order_rents.datestart') }}</label>
    <div class="col-md-10">
        <input class="form-control pull-right" name="datestart" type="date" id="datestart" required value="{{ old('datestart', optional($orderRent)->datestart) }}" minlength="1" placeholder="{{ trans('order_rents.datestart__placeholder') }}">
        {!! $errors->first('datestart', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dateend') ? 'has-error' : '' }}">
    <label for="dateend" class="col-md-2 control-label">{{ trans('order_rents.dateend') }}</label>
    <div class="col-md-10">
        <input class="form-control pull-left" name="dateend" type="date" id="dateend" required value="{{ old('dateend', optional($orderRent)->dateend) }}" minlength="1" placeholder="{{ trans('order_rents.dateend__placeholder') }}">
        {!! $errors->first('dateend', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Produit') ? 'has-error' : '' }}">
    <label for="Produit" class="col-md-2 control-label">{{ trans('order_rents.Produit') }}</label>
    <div class="col-md-10">

        <select class="form-control" name="Produit" id="Produit" required>
            <option value="{{ old('User', optional($orderRent)->Produit) }}" minlength="1" placeholder="{{ trans('order_rents.User__placeholder') }}">{{ trans('order_rents.Produit__placeholder') }}</option>
            @foreach ($produits as $Produit)
                <option value="{{$Produit->id }}" >{{$Produit->name }} / {{$Produit->name_ar}}</option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-group {{ $errors->has('User') ? 'has-error' : '' }}">
    <label for="User" class="col-md-2 control-label">{{ trans('order_rents.User') }}</label>
    <div class="col-md-10">


        <select class="form-control" name="User" id="User" required>
            <option value="{{ old('User', optional($orderRent)->User) }}" minlength="1" placeholder="{{ trans('order_rents.User__placeholder') }}">{{ trans('order_rents.User__placeholder') }}</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}" >{{$user->name }} / {{$user->user_name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">{{ trans('order_rents.price') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="number" id="price" required value="{{ old('price', optional($orderRent)->price) }}" minlength="1" placeholder="{{ trans('order_rents.price__placeholder') }}">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cautionnement') ? 'has-error' : '' }}">
    <label for="cautionnement" class="col-md-2 control-label">{{ trans('order_rents.cautionnement') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="cautionnement" type="number"  id="cautionnement" value="{{ old('cautionnement', optional($orderRent)->cautionnement) }}" minlength="1" placeholder="0">
        {!! $errors->first('cautionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
    <label for="total" class="col-md-2 control-label">{{ trans('order_rents.total') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="total" type="number" id="total" required readonly value="{{ old('total', optional($orderRent)->total) }}" placeholder="0">
        {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div>

