<section class="">
    <!-- Banner Designs start -->
<div class="pt-2 pb-5" id="banner">
    <div class="container pb-5">
        <div class="pt-2 pb-5 text-center text-decoration-underline">
            <h3 class="title" style="margin-bottom: 0 !important;"><span>Customer Reviews</span> <a href="#"></a></h3>
        </div>
      <div class="row child">
        
        <div class="col-md-12">
          <!-- Slider main container -->
          <div class="swiper-banner-container" style="overflow: hidden;">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">

              <!-- Slides -->
              <!-- Loop through Facebook reviews -->
              @forelse ($fbReviews as $review)
              <div class="swiper-slide">
                <img src="{{ asset($review->image_path) }}" alt="Facebook Review" class="img-fluid rounded">

                <div class="portfolio-slide-content-bottom">
                  <h3 class="portfolio-rating">
                    <span>5/5</span>
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                  </h3>
                </div>

              </div>
                @empty
                    <p class="text-center">No reviews found.</p>
                @endforelse
              <!-- end -->
            </div>
            <!-- If we need navigation buttons -->
          </div>
          <div class="portfolio-slider-control">
            <div class="swiper-banner-pagination text-center"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Designs start -->
</section>