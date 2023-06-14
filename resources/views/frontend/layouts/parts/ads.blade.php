 {{-- ads start --}}
 <section id="thumbnail-carousel" class="splide" data-bs-ride="carousel"
     aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
     <div class="splide__track ">
         <ul class="splide__list ">
                 @foreach ($ads as $ad)
                     <li class="splide__slide mx-2 list-unstyled">
                         <img src="{{ asset('storage/ads/' . $ad->image) }}" class=""
                             style="width:200px;height:100px;" alt="">
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
             interval: 4000, // Set the desired interval (in milliseconds) between each slide transition
             pauseOnHover: boolean = true,
             arrows: false,
             autoWidth: true,
             autoStart: boolean = true,
             pagination: false,
             type: 'loop',
             drag: 'free',
             focus: 'center',
             perPage: 4,
             autoScroll: {
                 speed: -2,
                 perMove: 1
             },
         }).mount();
     });
 </script>
