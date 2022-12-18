
              
                    <li style="    margin-top: 17px;">
                            <a  href="{{route('home','2022')}}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('general.Dashboard')}}</a>
                        </li>
                     

                      <li>
                        <a  href="{{url('profile')}}" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ trans('general.profile' )}}</a>
                      
                    </li>

@if(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5'|| Auth::user()->type == 'campany6'|| Auth::user()->type == 'campany7'|| Auth::user()->type == 'campany8'|| Auth::user()->type == 'campany9')
                    <li>
                        <a  href="{{url('seller')}}" aria-expanded="false">
                            <i class="fa fa-users"></i> {{ trans('general.seller' )}}</a>
                      
                    </li>
                    @endif
                    @if(Auth::user()->type == 'admin' || Auth::user()->type == 'superadmin')

                     <li style="color: rgba(255,255,255,.5);position: relative;display: block;padding: 10px 15px;">{{ trans('general.settings')}}  </li>

                 <li><a href="{{url('/settings')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.settings')}}</a></li>




                





                    <li>
                        <a  href="{{url('users')}}" aria-expanded="false">
                            <i class="fa fa-users"></i> {{ trans('general.users' )}}</a>
                      
                    </li>



                    <li>
                        <a  href="{{url('campany')}}" aria-expanded="false">
                            <i class="fa fa-users"></i> {{ trans('general.campany' )}}</a>
                      
                    </li>


                    <li>
                        <a  href="{{url('priorities')}}" aria-expanded="false">
                            <i class="fa fa-star"></i> {{ trans('priorities.model_plural' )}}</a>
                      
                    </li>



                    <li>
                        <a  href="{{url('notifications')}}" aria-expanded="false">
                            <i class="fa fa-bell"></i> {{ trans('general.notifications') }}</a>
                      
                    </li>


                    @if( Auth::user()->type == 'superadmin')
                    <li>
                            <a  href="{{url('countries')}}"><i class="fa fa-flag  fa-fw"></i> {{ trans('countries.Countries')}}</a>
                    </li>
                    @endif

                  
                     <li>
                            <a  href="{{url('cities')}}"><i class="fa fa-hospital-o  fa-fw"></i> {{ trans('general.cities')}}</a>
                        </li>



                 

                     <li>
                            <a href="{{url('villes')}}"><i class="fa fa-building fa-fw"></i> {{ trans('general.villes')}}</a>
                        </li>


                     <li>
                            <a href="{{url('sliders')}}"><i class="fa fa-sliders fa-fw"></i> {{ trans('general.sliders')}}</a>
                        </li>


                   

                     <li>
                            <a href="{{url('categories')}}"><i class="fa fa-align-right fa-fw"></i> {{ trans('general.categories')}}</a>
                        </li>

 <li>
                        <a  href="{{url('gestion')}}" aria-expanded="false">
                            <i class="fa fa-briefcase"></i> {{ trans('general.gestion' )}}</a>
                      
                    </li>


            <li style="color: rgba(255,255,255,.5);position: relative;display: block;padding: 10px 15px;">{{ trans('general.Produit')}}  </li>
                           
                        
                 
                            <li><a href="{{url('/notconfermid')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.notconfermid')}}</a></li>
                            <li><a href="{{url('/refused')}}"><i class="fa fa-list fa-fw"></i>{{ trans('produits.refused_produit')}}</a></li>
                            <li><a href="{{url('produits')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.active')}}</a></li>
                            <li><a href="{{url('vip1')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.vip1')}}</a></li>
                            <li><a href="{{url('vip2')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.vip2')}}</a></li>



                            <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                            
                           

                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                          @elseif(Auth::user()->type == 'seller')
                    <li style="color: rgba(255,255,255,.5);position: relative;display: block;padding: 10px 15px;">{{ trans('general.Produit')}}  </li>
                   <li>
                        <a  href="{{url('gestion')}}" aria-expanded="false">
                            <i class="fa fa-briefcase"></i> {{ trans('general.gestion' )}}</a>
                      
                    </li>
                             <li><a href="{{url('produits')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.active')}}</a></li>




                            <li><a href="{{url('vip1')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.vip1')}}</a></li>
                            <li><a href="{{url('vip2')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.vip2')}}</a></li>
                            


                             @if( Auth::user()->campanyproduit())
                              <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                                @endif

                 @elseif(Auth::user()->type == 'campany1' || Auth::user()->type == 'campany2' || Auth::user()->type == 'campany3' || Auth::user()->type == 'campany4' || Auth::user()->type == 'campany5'|| Auth::user()->type == 'campany6'|| Auth::user()->type == 'campany7'|| Auth::user()->type == 'campany8'|| Auth::user()->type == 'campany9')
              


                  <li style="color: rgba(255,255,255,.5);position: relative;display: block;padding: 10px 15px;">{{ trans('general.Produit')}}  </li>
                          
                              
                             
                            <li><a href="{{url('produits')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.active')}}</a></li>

                             <li><a href="{{url('vip3')}}"><i class="fa fa-list fa-fw"></i>Premium</a></li>
                          
                               <li><a href="{{url('vip1')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.vip1')}}</a></li>
                            
                           
                              
                            <li><a href="{{url('vip2')}}"><i class="fa fa-list fa-fw"></i>{{ trans('general.vip2')}}</a></li>

                         
                @if(Auth::user()->type == 'campany1' && count(Auth::user()->Produit) < 10)
                            <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                @elseif(Auth::user()->type == 'campany2' && count(Auth::user()->Produit) < 15)
                            <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                 @elseif(Auth::user()->type == 'campany6')
                            <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                 @elseif(Auth::user()->type == 'campany3' && count(Auth::user()->Produit) < 25)   <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                            @elseif(Auth::user()->type == 'campany4' && count(Auth::user()->Produit) < 40)   <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                            @elseif(Auth::user()->type == 'campany5' && count(Auth::user()->Produit) < 60)   <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                            @elseif(Auth::user()->type == 'campany7' && count(Auth::user()->Produit) < 100)   <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                            @elseif(Auth::user()->type == 'campany8' && count(Auth::user()->Produit) < 200)   <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                            @elseif(Auth::user()->type == 'campany9' && count(Auth::user()->Produit) < 300)   <?php $categories = \App\Models\category::all();?>
                              @foreach($categories as $category)
                              <li><a href="{{ route('produits.produit.create', $category->id) }}"><i class="fa fa-plus-square fa-fw"></i> {{ trans('general.add')}} {{ $category->name }} ( {{ $category->name_ar }} )</a></li>
                              @endforeach
                            @endif
  
                    @endif
                 
                   
              