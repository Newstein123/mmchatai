 {{-- ads start --}}
 <section id="thumbnail-carousel" class="splide" data-bs-ride="carousel"
     aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
     <div class="splide__track">
         <ul class="splide__list ">
             @foreach ($ads as $ad)
                 <li class="splide__slide mx-2 list-unstyled">
                     <a href="{{ $ad->link }}" target="{{ $ad->link !== '#' ? '_black' : '' }}"
                         onclick="adCount('{{ route('adCount', $ad->id) }}', '{{ $ad->link }}')"><img
                             src="{{ asset('storage/ads/' . $ad->image) }}" class="ad-image py-1" alt=""></a>
                 </li>
             @endforeach
         </ul>
     </div>
 </section>
 {{-- ads End --}}
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         new Splide('.splide', {
             autoplay: true, // Enable auto-scrolling
             interval: 2000, // Set the desired interval (in milliseconds) between each slide transition
             pauseOnHover: boolean = true,
             arrows: false,
             autoWidth: true,
             autoStart: boolean = true,
             pagination: false,
             type: 'loop',
             drag: 'free',
             focus: 'center',
             perPage: 1,
             autoScroll: {
                 speed: 2,
                 perMove: 1
             },
             breakpoints: {
                 768: {
                    autoplay: true, // Enable auto-scrolling at or below 768px width
                    interval: 2000, // Disable auto-scrolling in mobile view
                 }
             }
         }).mount();
     });
 </script>
