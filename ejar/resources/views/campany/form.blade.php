
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
    <label for="user_name" class="col-md-2 control-label">User Name</label>
    <div class="col-md-10">
        <input class="form-control" name="user_name" type="text" id="user_name" value="{{ old('user_name', optional($user)->user_name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter user name here...">
        {!! $errors->first('user_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="text" id="password" value="{{ old('password') }}" minlength="1" maxlength="255"  placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="tel" id="phone" value="{{ old('phone', optional($user)->phone) }}" maxlength="255" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="file" id="photo" value="{{ old('photo', optional($user)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
    <label for="rating" class="col-md-2 control-label">Rating</label>
    <div class="col-md-10">
        <input class="form-control" name="rating" type="text" id="rating" value="{{ old('rating', optional($user)->rating) }}" maxlength="255" placeholder="Enter rating here...">
        {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('siteweb') ? 'has-error' : '' }}">
    <label for="siteweb" class="col-md-2 control-label">Siteweb</label>
    <div class="col-md-10">
        <input class="form-control" name="siteweb" type="text" id="siteweb" value="{{ old('siteweb', optional($user)->siteweb) }}" maxlength="255" placeholder="Enter siteweb here...">
        {!! $errors->first('siteweb', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
    <label for="facebook" class="col-md-2 control-label">Facebook</label>
    <div class="col-md-10">
        <input class="form-control" name="facebook" type="text" id="facebook" value="{{ old('facebook', optional($user)->facebook) }}" maxlength="255" placeholder="Enter facebook here...">
        {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
    <label for="instagram" class="col-md-2 control-label">Instagram</label>
    <div class="col-md-10">
        <input class="form-control" name="instagram" type="text" id="instagram" value="{{ old('instagram', optional($user)->instagram) }}" maxlength="255" placeholder="Enter instagram here...">
        {!! $errors->first('instagram', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
    <label for="youtube" class="col-md-2 control-label">Youtube</label>
    <div class="col-md-10">
        <input class="form-control" name="youtube" type="text" id="youtube" value="{{ old('youtube', optional($user)->youtube) }}" maxlength="255" placeholder="Enter youtube here...">
        {!! $errors->first('youtube', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
    <label for="twitter" class="col-md-2 control-label">Twitter</label>
    <div class="col-md-10">
        <input class="form-control" name="twitter" type="text" id="twitter" value="{{ old('twitter', optional($user)->twitter) }}" maxlength="255" placeholder="Enter twitter here...">
        {!! $errors->first('twitter', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('whats') ? 'has-error' : '' }}">
    <label for="whats" class="col-md-2 control-label">Whats</label>
    <div class="col-md-10">
        <input class="form-control" name="whats" type="tel" id="whats" value="{{ old('whats', optional($user)->whats) }}" maxlength="255" placeholder="Enter whats here...">
        {!! $errors->first('whats', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" name="type" id="type" value="{{ old('type', optional($user)->type) }}">
           
           
             <option value="campany1">{{ trans('user.campany1') }}</option>
            <option value="campany2">{{ trans('user.campany2') }}</option>
            <option value="campany3">{{ trans('user.campany3') }}</option>
        </select>
      
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>


     <div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
      <h3 class="box-title"> location informations</h3>
     </div>
       <div class="box-body">
                  <div class="content"> 
                   click  position in the map
          <!---------- el map ------------->
         <div class="form-group col-sm-10" style="padding:10px">
            <div id="mape" style="    height: 300px;width: 400; "></div>
        </div> 
        </div> </div>
               <div class="box-body">
                 
                <div class="form-group col-sm-12">
                  <label for="latitude" class="col-sm-2 control-label">Latitude</label>
                   <div class="form-group col-sm-10">
                  <input type="text" class=" col-sm-10 form-control" value="{{ old('latitude', optional($user)->latitude) }}" id="latitude" placeholder="latitude " name="latitude" readonly required>
                </div>
                </div>
                <div class="form-group col-sm-12">
                  <label for="longitude" class="col-sm-2 control-label">Longitude</label>
                   <div class="form-group col-sm-10">
                  <input type="text" class="col-sm-10 form-control" value="{{ old('longitude', optional($user)->longitude) }}" id="longitude" placeholder="longitude " name="longitude" readonly required>
                </div>
            </div>
</div>
              
 <div class="form-group col-sm-12">
                 


<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id" name="city_id">
                <option value="" style="display: none;" {{ old('city_id', optional($user)->city_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select city</option>
            @foreach ($cities as $key => $city)
                <option value="{{ $key }}" {{ old('city_id', optional($user)->city_id) == $key ? 'selected' : '' }}>
                    {{ $city }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



                </div>
              

               

                    <div class="form-group col-sm-12">
                   
               
<div class="form-group {{ $errors->has('ville_id') ? 'has-error' : '' }}">
    <label for="ville_id" class="col-md-2 control-label">Ville</label>
    <div class="col-md-10">
        <select class="form-control" id="ville_id" name="ville_id">
                <option value="" style="display: none;" {{ old('ville_id', optional($user)->ville_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select ville</option>
            @foreach ($villes as $key => $ville)
                <option value="{{ $key }}" {{ old('ville_id', optional($user)->ville_id) == $key ? 'selected' : '' }}>
                    {{ $ville }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('ville_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



                </div>
                   
                   
                
             


            </div>
          </div>
        </div>


