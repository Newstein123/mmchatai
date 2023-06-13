<section id="thumbnail-carousel" class="splide"
    aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($ads as $ad)
                <li class="splide__slide mx-5 px-5">
                    <img src="{{ asset('storage/ads/' . $ad->image) }}" class="px-4" style="width:250px;height:130px;"
                        alt="">
                </li>
            @endforeach
        </ul>
    </div>
</section>

<script>
    document.addEventListener( 'DOMContentLoaded', function () {
  new Splide( '#thumbnail-carousel', {
		fixedWidth: 200,
		gap       : 10,
		rewind    : true,
		pagination: false,
        type   : "loop",
        perPage: 3,
        arrows:false,
  } ).mount();
} );


</script>
