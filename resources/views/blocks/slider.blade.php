{{--
  Title: Slider
  Description: Slider
  Category: formatting
  Icon: admin-comments
  Keywords: Slider
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: center
  SupportsMode: false
  SupportsMultiple: false
--}}

@php
    $images = get_field('images');
@endphp

<div class="slider">
    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->

        @if( $images )
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach( $images as $image )
                    <div class="swiper-slide"><a href="<?php echo esc_url($image['url']); ?>">
                            <img src="<?php echo esc_url($image['sizes']['gallery']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a></div>

                @endforeach
            </div>

            <!-- If we need navigation buttons -->
            <div class="slider-buttons">
                <div class="slider-button-prev"></div>
                <div class="slider-button-next"></div>
            </div>
        @endif
    </div>

        <div class="slider-buttons">
            <div class="slider-button-prev"></div>
            <div class="slider-button-next"></div>
        </div>
</div>