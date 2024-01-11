<div class="header-category-menu" style="float:left;">
                        <ul class="mega">
                            <style>
                                .pnc{
                                    position: absolute;right: 5px;font-size: 22px;top: 0;border-left: 1px solid gainsboro;padding: 10px 10px;
                                }
                                @media(max-width:550px){
                                    .pro ul{
                                        background:#f1f1f1 !important;
                                    }
                                      .pro ul li img{
                                          display:block !important;
                                      }
                                  .pro ul li {
  display: inline-block !important;
  text-align: center;
  margin: 1px;
  padding: 5px; 
  border-radius: 5px;
}
.f-li{
    background:#f1f1f1 !important;opacity:0.8;
}
.f-li.active{background:white !important}
                                }
                            </style>
                            @foreach (\App\Models\Category::where('status',1)->orderBy('pos','asc')->get() as $category)
                                <li class="f-li">
                                   @if ($category->sub_categories->count() > 0)
                                        <a href="javascript:void(0)">
                                     
                                    @else
                                    <a href="{{route('category.product',$category->slug)}}">
                                    @endif
                                
                                        <img style="width: 22px;height: 22px;margin-right: 10px;display: inline-block;" src="{{asset('uploads/category/'.$category->cover_photo)}}" alt="">{{$category->name}}</a>
                                    @if ($category->sub_categories->count() > 0)
                                        <ul class="pro">
                                            @foreach ($category->sub_categories as $sub_category)
                                                <li >
                                                @if ($sub_category->miniCategory->count() > 0)
                                                    <a  href="javascript:void(0)" style="padding:15px !important;position:relative">
                                                     <i class="icon-right icofont icofont-simple-down pnc"  ></i>
                                                @else
                                                    <a style="padding:15px !important" href="{{route('subCategory.product', $sub_category->slug)}}"> 
                                                @endif

                                  {{$sub_category->name}}
                                                    </a>
                                                    @if ($sub_category->miniCategory->count() > 0)

                                                            <ul class="sub-cat scat" style="background: #dcdcdc;"> 
                                                                @foreach ($sub_category->miniCategory as $miniCategory)
                                                                    <li style="display:inline-block !important">
                                                                       
                                                                         @if ($miniCategory->extraCategory->count() > 0)
                                                                            <a href="javascript:void(0)">
                                                                        @else
                                                                           <a href="{{route('miniCategory.product', $miniCategory->slug)}}">
                                                                        @endif

                                                                    <img style="width: 22px;height: 22px;margin-right: 10px;display: inline-block;" src="{{asset('uploads/mini-category/'.$miniCategory->cover_photo)}}" alt="">
                                                                        {{$miniCategory->name}}
                                                                    </a>
                                                                     @if ($miniCategory->extraCategory->count() > 0)
                                                                        <ul class="sub-cat mcat">
                                                                        <p class="cback"><span id="sub-close">{{$category->name}}/ {{$sub_category->name}}</span></p>
                                                                            @foreach ($miniCategory->extraCategory as $extraCategory)
                                                                                <li><a href="{{route('extraCategory.product', $extraCategory->slug)}}">
                                                                                    <img style="width: 22px;height: 22px;margin-right: 10px;display: inline-block;" src="{{asset('uploads/extra-category/'.$extraCategory->cover_photo)}}" alt="">
                                                                     
                                                                                    {{$extraCategory->name}}
                                                                                </a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            
                        </ul>
                   
                    <style>
                        .mo-f-category{
                            position: absolute;
top: 0 !important;
width: 80% !important;
background: transparent !important;
left: 90px;
z-index: 99;
text-align: left;
                        }
                        .shop-category.tf .cat-row .cat-item {
  width: 30%;
  display: inline-block !important;
  text-align: center;
  background: #fff;
  text-align: center;
  padding: 15px 0;
  box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  margin: 1% 1% 0 0;
  border-radius: 5px;
  text-decoration: none;
  float:none
}
.cvc{
    padding: 10px;
text-align: left;
color: black;
border-bottom: 1px solid gainsboro !important;
display: block;
}
                    </style>
                    <div class="shop-category mo-f-category tf" style="padding-bottom: 20px;text-align: center;">
                        <div class="" style="padding-right:10px">
                            <div class="cat-rows">
                                @foreach (App\Models\SubCategory::where('status', true)->inRandomOrder()->take(21)->get() as $category)
                                <a href="{{route('subCategory.product',$category->slug)}}" class="cat-item cvc">
                                    <div class="">
                                        {{$category->name}} 
                                    </div>
                                </a>
                                
                                @endforeach
                               
                               
                                
                            </div>
                        </div>
                    </div>
                
                <style>
                    .submenu:hover ul {
                        display:block;
                        left: 0;
top: 45px;
border: none;

                    }
                    @media(max-width: 1000px){
                        .authpro{
                            text-align: center;
                            display:block;
                            border-bottom: 1px solid gainsboro;
padding-top: 15px;
                        }
                    }
                </style>

<script>
    (function($,window){
    $(document).ready(function(){
        // mobile-menu-show
      
        
         // submenu arrow-icon-add-auto
         $('ul').parent('li').prepend('<div style="position: absolute;right: 0;top: 10px;color: #666;" class="aroow2 icon-right icofont icofont-simple-right"></div>');

       
        $('ul.mega li.f-li').unbind('click').click(function(e){
            // submenu-dropdown
            if( $('ul.mega li.f-li').children('ul').show()){
                $('ul.mega li.f-li').children('ul').hide();
                $('ul.mega li.f-li').removeClass('active');
            }
            $('.mo-f-category').hide();
            $(this).children('ul').toggle();
            $(this).addClass('active')
            e.stopPropagation();
            // e.preventDefault();
        });
        $('ul.mega li.f-li ul li').unbind('click').click(function(e){
            // submenu-dropdown
            $(this).children('ul').toggle();
            e.stopPropagation();
            // e.preventDefault();
        });
      
      
    });
   
})(jQuery, window);
</script>