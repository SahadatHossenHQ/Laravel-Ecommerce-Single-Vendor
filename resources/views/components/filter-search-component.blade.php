<form action="{{ route('product.filter') }}" method="GET" id="form">
    <div class="range">
        <ul class="dropdown-menu6">
            <li>
                <div id="slider-range"></div>
                <input type="text" name="amount" readonly id="amount"
                    style="border: 0; color: #ffffff; font-weight: normal;" />

            </li>
        </ul>
    </div>


    @isset($request->mini_category)
        @php
            $input_name = 'Mini Category';
            $input = 'mini_category';
            $data = DB::table('mini_categories')
                ->where('slug', $request->mini_category)
                ->first();
            $datan = DB::table('sub_categories')
                ->where('id', $data->category_id)
                ->first();
            $cidn = $datan->category_id;

        @endphp
    @endisset
    @isset($request->extra_category)
        @php
            $input_name = 'Extra Category';
            $input = 'extra_category';
            $data = DB::table('extra_mini_categories')
                ->where('slug', $request->extra_category)
                ->first();
            $mini = DB::table('mini_categories')
                ->where('id', $data->category_id)
                ->first();
            $datas = DB::table('sub_categories')
                ->where('id', $mini->category_id)
                ->first();
            $cidn = $datas->category_id;

        @endphp
    @endisset
    @isset($request->sub_category)
        @php
            $input_name = 'Sub Category';
            $input = 'sub_category';
            $data = DB::table('sub_categories')
                ->where('slug', $request->sub_category)
                ->first();
            $cidn = $data->category_id;
            $idn = $data->id;

        @endphp
    @endisset
    @isset($request->category)
        @php
            $input_name = 'Category';
            $input = 'category';
            $data = DB::table('categories')
                ->where('slug', $request->category)
                ->first();
            $cidn = $data->id;

        @endphp
    @endisset
    @isset($request->collection)
        @php
            $input_name = 'Collection';
            $input = 'collection';
            $data = DB::table('collections')
                ->where('slug', $request->collection)
                ->first();
        @endphp
    @endisset

    @if ($name == 'category')
        @php
            $input_name = 'Category';
            $input = 'category';
            $data = DB::table('categories')->where('slug', $value)->first();
            $cidn = $data->id;
        @endphp
    @endif
    @if ($name == 'sub_category')
        @php
            $input_name = 'Sub Category';
            $input = 'sub_category';
            $data = DB::table('sub_categories')->where('slug', $value)->first();
            $cidn = $data->category_id;
            $idn = $data->id;
        @endphp
    @endif
    @if ($name == 'mini_category')
        @php
            $input_name = 'Mini Category';
            $input = 'mini_category';
            $mini = DB::table('mini_categories')->where('slug', $value)->first();
            $data = DB::table('sub_categories')
                ->where('id', $mini->category_id)
                ->first();
            $cidn = $data->category_id;
        @endphp
    @endif
    @if ($name == 'extra_category')
        @php
            $input_name = 'Extra Category';
            $input = 'extra_category';
            $emini = DB::table('extra_mini_categories')->where('slug', $value)->first();
            $mini = DB::table('mini_categories')
                ->where('id', $emini->mini_category_id)
                ->first();
            $data = DB::table('sub_categories')
                ->where('id', $mini->category_id)
                ->first();
            $cidn = $data->category_id;
        @endphp
    @endif
    @isset($cidn)
        <style>
            .cck2 {
                border-radius: 5px;
                cursor: pointer;
                border: 1px solid black;
                text-align: center;
                padding: 2px 10px;
                position: relative;
            }

            .cck2 input {
                opacity: 0;
                position: absolute;
            }

            .cck2.active {
                background: black;
                color: white;
            }
        </style>

        @foreach (App\Models\Attribute::where('category_id', $cidn)->get() as $attribute)
            @if ($attribute->values->count() > 0)
                <div class="left-side mb-3">
                    <p class=""
                        style="border-top: 1px solid gainsboro;margin-bottom: 10px;padding-top: 10px;font-weight: 700;">
                        {{ $attribute->name }}</p>
                    @foreach ($attribute->values as $avalue)
                        <li style="display:inline-block;">
                            <label
                                class="cck2 @isset($request->attri) @foreach ($request->attri as $req_brand) {{ $avalue->slug == $req_brand ? 'active' : '' }}  @endforeach @endisset"
                                for="{{ $avalue->slug }}">
                                <input type="checkbox" id="{{ $avalue->slug }}" name="attri[]" class="checked"
                                    value="{{ $avalue->slug }}"
                                    @isset($request->attri) @foreach ($request->attri as $req_brand) {{ $avalue->slug == $req_brand ? 'checked' : '' }}  @endforeach @endisset>
                                {{ $avalue->name }}
                            </label>
                        </li>
                    @endforeach
                </div>
            @endif
        @endforeach
    @endisset
    @isset($input_name)
        <div class="left-side mb-3">
            <p class=""
                style="border-top: 1px solid gainsboro;margin-bottom: 10px;padding-top: 10px;font-weight: 700;">
                {{ $input_name }}</p>
            <ul>
                <li>
                    <input style="opacity:0" type="checkbox" name="{{ $input }}" class="checked" id="dcd"
                        value="{{ $data->slug }}" checked>
                    <span class="span">
                        @if ($input == 'category')
                            {{ $data->name }}
                        @endif
                        @if ($input == 'sub_category')
                            @php($cs = App\Models\Category::where('id', $cidn)->first())
                            <a href="{{ route('category.product', $cs->slug) }}">{{ $cs->name }}</a><i
                                class="icon-down icofont icofont-simple-right"></i>{{ $data->name }}
                        @endif
                        @if ($input == 'mini_category')
                            @if (isset($datan))
                                @php($cs = App\Models\Category::where('id', $cidn)->first())
                                <a href="{{ route('category.product', $cs->slug) }}">{{ $cs->name }}</a><i
                                    class="icon-down icofont icofont-simple-right"></i> <a
                                    href="{{ route('subCategory.product', $datan->slug) }}"> {{ $datan->name }}</a><i
                                    class="icon-down icofont icofont-simple-right"></i>{{ $data->name }}
                            @else
                                @php($cs = App\Models\Category::where('id', $cidn)->first())
                                <a href="{{ route('category.product', $cs->slug) }}">{{ $cs->name }}</a><i
                                    class="icon-down icofont icofont-simple-right"></i> <a
                                    href="{{ route('subCategory.product', $data->slug) }}"> {{ $data->name }}</a><i
                                    class="icon-down icofont icofont-simple-right"></i> {{ $mini->name }}
                            @endif
                        @endif
                    </span>
                </li>
                @if ($input == 'category')
                    @foreach (App\Models\SubCategory::where('category_id', $cidn)->get() as $cat)
                        <li>
                            <input class="sub_mod" type="radio" id="{{ $cat->slug }}" name="sub_category"
                                value="{{ $cat->slug }}">
                            <label for="{{ $cat->slug }}"><span class="span sub_mod">{{ $cat->name }}</span></label>

                        </li>
                    @endforeach
                @endif
                @if ($input == 'sub_category')
                    @foreach (App\Models\miniCategory::where('category_id', $idn)->get() as $cat)
                        <li>
                            <input class="sub_mod" type="radio" id="{{ $cat->slug }}" name="mini_category"
                                value="{{ $cat->slug }}">
                            <label for="{{ $cat->slug }}"><span class="span sub_mod">{{ $cat->name }}</span></label>

                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    @else
        <ul>
            @foreach (App\Models\Category::get() as $cat)
                <li>
                    <input class="sub_mod" type="radio" id="{{ $cat->slug }}" name="category"
                        value="{{ $cat->slug }}">
                    <label for="{{ $cat->slug }}"><span class="span sub_mod">{{ $cat->name }}</span></label>

                </li>
            @endforeach
        </ul>
    @endisset
    <!--<input type="hidden" name="amount" value="TK10+-+TK600000">-->
    <div class="left-side">
        <p style="border-top: 1px solid gainsboro;margin-bottom: 10px;padding-top: 10px;font-weight: 700;">Brand</p>
        <ul style="height: 200px;overflow-y: scroll;scrollbar-width: thin;">
            @foreach ($brands as $brand)
                <li>
                    <input type="checkbox" name="brands[]" class="checked" value="{{ $brand->slug }}"
                        @isset($request->brands) @foreach ($request->brands as $req_brand) {{ $brand->slug == $req_brand ? 'checked' : '' }}  @endforeach @endisset>
                    <span class="span">{{ $brand->name }}</span>
                </li>
            @endforeach

        </ul>
    </div>
    <style>
        .cc label {
            display: block;

        }
    </style>
    <hr>

    <div class="cc">
        <label>
            <input @isset($request->sort) @if ($request->sort == 'Best Sellers') checked @endif @endisset
                name="sort" type="radio" value="Best Sellers"> Best Sellers
        </label>
        <label>
            <input @isset($request->sort) @if ($request->sort == 'New To Old') checked @endif @endisset
                name="sort" type="radio" value="New To Old"> New Released
        </label>
        <label>
            <input @isset($request->sort) @if ($request->sort == 'High To Low') checked @endif @endisset
                name="sort" type="radio" value="High To Low"> Price- High To Low
        </label>
        <label>
            <input @isset($request->sort) @if ($request->sort == 'Low To High') checked @endif @endisset
                name="sort" type="radio" value="Low To High"> Price- Low To High
        </label>
        <label>
            <input @isset($request->sort) @if ($request->sort == 'dHigh To Low') checked @endif @endisset
                name="sort" type="radio" value="dHigh To Low"> Discount- High To Low
        </label>
        <label>
            <input @isset($request->sort) @if ($request->sort == 'dLow To High') checked @endif @endisset
                name="sort" type="radio" value="dLow To High"> Discount- Low To High
        </label>

    </div>
    <hr>



    <input type="hidden" name="unr" value="{{ $request->unr ?? Request::url() }}">

    <div class="left-side action">
        <ul>
            <li><input value="Filter" type="submit"></li>
            <li> <a class="redirect"
                    style="background: #ff5722;color: white;border: none;padding: 8px 25px;display: inline-block;"
                    href="{{ $request->unr ?? Request::url() }}">Reset</a> </li>
        </ul>
    </div>
    <style>
        .action ul li {
            display: inline-block;
        }

        .action ul li input {
            display: block;
            background: #2abbe8;
            color: white;
            padding: 8px 25px;
            border-radius: 4px;
            border: none;
            font: 16px;
        }
    </style>
</form>
@push('js')
    <script>
        $('.cck').click(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
        })
        $('.sub_mod').click(function() {
            if ($(this).is(':checked')) {
                $('#dcd').prop('checked', false)
            }
        })
        $('.cck2').click(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
        })
    </script>
@endpush
