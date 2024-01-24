@if($pop)
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <a href="{{$pop->url}}">
                    <div class="item">
                        <img src="{{asset('uploads/slider/'.$pop->image)}}" />
                    </div>
                </a>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endif
<style>
    .dtrr {
        width: 260px;
    }

    @media(max-width:576px) {
        .oc.shop-category .cat-row a:nth-last-child(2) {
            display: none
        }
    }

    @media(max-width:1199px) {
        .hero-slider.col-lg-9 {
            flex: 0 0 72% !important;
            max-width: 72% !important;
        }

        .hero-categories ul li:last-child {
            display: none;
        }

        .hero-categories ul li:nth-last-child(2) {
            display: none;
        }

        @media(max-width:1000px) {
            .hero-categories ul li:last-child {
                display: block;
            }

            .hero-categories ul li:nth-last-child(2) {
                display: block;
            }

            .dtrr {
                display: none;
            }

            .hero-slider.col-lg-9 {
                flex: inherit !important;
                max-width: inherit !important;
            }
        }

    }
</style>
<section class="hero-area" style="margin-top:2px">
    <div class="container">
        <div class="row">
            <div class="dtrr"></div>
            <div class="hero-slider col-lg-9">
                <div class="slideshow">
                    <div class="slider slick-slides">


                        @foreach ($sliders as $key => $slider)
                        <div class="item">
                            <a href="{{$slider->url}}">
                                <img src="{{asset('uploads/slider/'.$slider->image)}}" />
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<style>
    .sub-slider img::hover {
        transform: scale(1.1) !important;
    }

    .navbar_fixed {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999999;
    }

    .catplay .draggable {
        padding: 20px 0px
    }

    .catplay .slick-slide {
        margin: 0px 5px
    }
</style>