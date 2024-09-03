 <!-- Modal -->
 <!--
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 70vw;">
         <div class="modal-content" style="border-radius: 20px;">
             <div class="modal-body p-0">
                 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner" style="border-radius: 20px;">
                         @foreach ($gallery as $index => $item)
<div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                 <img id="modal-img" src="{{ asset('uploads/gallery/' . $item->image) }}"
                                     class="d-block w-100" alt="Gallery Image">
                             </div>
@endforeach
                     </div>
                     <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                         {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                         <i class="fas fa-chevron-left"></i>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                         {{-- <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span> --}}
                         <i class="fas fa-chevron-right"></i>
                     </a>
                 </div>
             </div>
         </div>
     </div>
    </div>
-->
 <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered popup-image" role="document">
         <div class="modal-content">
             <div class="modal-header border-0 pb-0">
                 <h5 class="modal-title" id="my-modal-title">{{ $company_name }}</h5>
                 <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- <div class="conatiner mb-3 mt-3 px-3">
                 <div class="button-category-image d-flex gap-3">
                     <button class="button-category active" id="showAll">
                         {{ __('All photos') }} ({{ $galleryCount }})
                     </button>
                     @foreach ($categories as $category)
                         <button class="button-category" data-category-id="{{ $category->id }}">
                             {{ $category->name }} ({{ $category->galleries_count }})
                         </button>
                     @endforeach
                 </div>
             </div> --}}
             <div class="container mb-3 mt-3 px-3">
                 <div class="row mx-0">
                     <div class="button-category-image gap-4 col-12 col-sm-12 col-md-12 col-lg-12 px-0">
                         <button class="button-category active" id="showAll">
                             {{ __('Property') }} ({{ $galleryCount }})
                         </button>
                         @foreach ($categories as $category)
                             <button class="button-category" data-category-id="{{ $category->id }}">
                                 {{ $category->name }} ({{ $category->galleries_count }})
                             </button>
                         @endforeach
                         <button class="button-category " data-video-id="{{ $category->id }}">
                             {{ __('Video') }} ({{ $totalvideos }})
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body pop-up-body pt-0">
                 <div class="col-12 p-0 container-sticky">
                     <div class="div sticky">
                         <h4 id="galleryTitle" style="font-size: 35px; font-weight: 600" class="">
                             {{ __('Property') }}</h4>
                         <div id="galleryContainer" class="row justify-content-start px-1">
                             {{-- @foreach ($galleries as $gallery)
                                 <div class="gallery-item col-12 col-sm-6 col-md-6 col-lg-6"
                                     data-category-id="{{ $gallery->categories->pluck('id')->implode(',') }}"
                                     style="padding: 0.4rem;">
                                     <a class="example-image-link container-popup-image"
                                         href="{{ asset('uploads/gallery/' . $gallery->image) }}"
                                         data-lightbox="gallery" data-title="{{ $gallery->description }}"
                                         data-lightbox="category-{{ $gallery->categories->pluck('id')->implode('-') }}">
                                         <img class="example-image image-thumbnail"
                                             src="{{ asset('uploads/gallery/' . $gallery->image) }}"
                                             alt="{{ $gallery->description }}" style="cursor:pointer" />
                                     </a>
                                     <h5 style="font-size: 15px" class="mt-2">{{ $gallery->description }}</h5>
                                 </div>
                             @endforeach --}}
                             {{-- @foreach ($galleries as $gallery)
                                 <div class="gallery-item col-12 col-sm-6 col-md-6 col-lg-6"
                                     data-category-id="{{ $gallery->categories->pluck('id')->implode(',') }}"
                                     style="padding: 0.4rem;">
                                     <a class="example-image-link container-popup-image"
                                         href="{{ asset('uploads/gallery/' . $gallery->image) }}"
                                         data-lightbox="gallery" data-title="{{ $gallery->description }}"
                                         data-lightbox-category="category-{{ $gallery->categories->pluck('id')->implode('-') }}">
                                         <!-- Category-specific lightbox group -->
                                         <img class="example-image image-thumbnail"
                                             src="{{ asset('uploads/gallery/' . $gallery->image) }}"
                                             alt="{{ $gallery->description }}" style="cursor:pointer" />
                                     </a>
                                     <h5 style="font-size: 15px" class="mt-2">
                                         {{ Str::limit($gallery->description, 20) }}</h5>
                                 </div>
                             @endforeach --}}
                             @foreach ($galleries as $gallery)
                                 <div class="gallery-item col-12 col-sm-6 col-md-6 col-lg-6"
                                     data-category-id="{{ $gallery->categories->pluck('id')->implode(',') }}"
                                     style="padding: 0.4rem;">
                                     <a class="example-image-link container-popup-image"
                                         href="{{ asset('uploads/gallery/' . $gallery->image) }}"
                                         data-fancybox="gallery-{{ $gallery->categories->pluck('id')->implode('-') }}"
                                         data-caption="{{ $gallery->description }}">
                                         <!-- Category-specific Fancybox group -->
                                         <img class="example-image image-thumbnail"
                                             src="{{ asset('uploads/gallery/' . $gallery->image) }}"
                                             alt="{{ $gallery->description }}" style="cursor:pointer" />
                                     </a>
                                     <h5 style="font-size: 15px" class="mt-2">
                                         {{ Str::limit($gallery->description, 20) }}</h5>
                                 </div>
                             @endforeach

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

 {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet"> --}}
 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery2/3.0.2/css/nanogallery2.min.css" /> --}}
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script> --}}
 <script>
     document.querySelectorAll('.button-category').forEach(button => {
         button.addEventListener('click', function() {
             // Remove 'active' class from all buttons
             document.querySelectorAll('.button-category').forEach(btn => btn.classList.remove(
                 'active'));

             // Add 'active' class to the clicked button
             this.classList.add('active');
         });
     });
 </script>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const galleryContainer = document.getElementById('galleryContainer');
         const galleryItemsHTML = galleryContainer.innerHTML;
         const showAllButton = document.getElementById('showAll');
         const categoryButtons = document.querySelectorAll('.button-category');
         const galleryTitle = document.getElementById('galleryTitle');
         const videoButton = document.querySelector('[data-video-id]');

         function showAllGalleries() {
             galleryContainer.innerHTML = galleryItemsHTML; // Restore gallery items
             const galleryItems = galleryContainer.querySelectorAll('.gallery-item');
             galleryItems.forEach(item => {
                 item.style.display = 'block';
                 const link = item.querySelector('a');
                 link.setAttribute('data-fancybox', 'gallery');
             });
         }

         function setActiveButton(activeButton) {
             categoryButtons.forEach(button => {
                 button.classList.remove('active');
             });
             activeButton.classList.add('active');
         }

         showAllButton.addEventListener('click', function() {
             showAllGalleries();
             setActiveButton(this);
             //  lightbox.option({
             //      'resizeDuration': 200,
             //      'wrapAround': true
             //  });
         });

         categoryButtons.forEach(button => {
             button.addEventListener('click', function() {
                 if (this.hasAttribute('data-video-id')) return;

                 galleryContainer.innerHTML = galleryItemsHTML;
                 const galleryItems = galleryContainer.querySelectorAll('.gallery-item');
                 const categoryId = this.getAttribute('data-category-id');
                 const categoryName = this.textContent.split('(')[0].trim();
                 galleryTitle.textContent = categoryName;

                 galleryItems.forEach(item => {
                     const itemCategoryIds = item.getAttribute('data-category-id').split(
                         ',');
                     const link = item.querySelector('a');
                     if (categoryId === 'all' || itemCategoryIds.includes(categoryId)) {
                         item.style.display = 'block';
                         link.setAttribute('data-fancybox', 'category-' + categoryId);
                     } else {
                         item.style.display = 'none';
                     }
                     if (categoryId == null) {
                         item.style.display = 'block';
                     }
                 });

                 //  lightbox.option({
                 //      'resizeDuration': 200,
                 //      'wrapAround': true
                 //  });

                 setActiveButton(this);
             });
         });


         //  videoButton.addEventListener('click', function() {
         //      galleryContainer.innerHTML = ''; // Clear the current gallery items

         //      // Build all video items into a single HTML string
         //      let videoItemsHTML = '';
         //      @foreach ($videos as $video)
         //          videoItemsHTML += `
        //     <div class="video-item col-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0.4rem;">
        //         <a data-fancybox="video-gallery" href="https://www.youtube.com/embed/{{ $video->video_url }}?autoplay=0"
        //             data-caption="{{ Str::limit($video->description, 20) }}">
        //             <img src="https://img.youtube.com/vi/{{ $video->video_url }}/0.jpg" alt="{{ $video->description }}" style="cursor:pointer" class="img-fluid" />
        //         </a>
        //         <h5 style="font-size: 15px" class="mt-2">
        //             {{ Str::limit($video->description, 20) }}
        //         </h5>
        //     </div>`;
         //      @endforeach
         //      console.log('Generated video HTML:', videoItemsHTML);
         //      galleryContainer.innerHTML = videoItemsHTML;



         //      setActiveButton(this);
         //  });
         videoButton.addEventListener('click', function() {
             galleryContainer.innerHTML = ''; // Clear the current gallery items

             // Build all video items into a single HTML string
             let videoItemsHTML = '';
             @foreach ($videos as $video)
                 videoItemsHTML += `
            <div class="video-item  col-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0.4rem;">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $video->video_url }}" title="{{ $video->description }}" frameborder="0"
                       style="pointer-events: none;">
                </iframe>

                <a class="video-link overlay text-decoration-none d-flex align-items-center" width="100%" data-fancybox="video-gallery" href="https://www.youtube.com/watch?v={{ $video->video_url }}" >
                </a>
                <h5 style="font-size: 18px; color: black;" class="mt-2 fw-bold">
                    {{ Str::limit($video->name, 20) }}
                </h5>

            </div>`;
             @endforeach
             galleryContainer.innerHTML = videoItemsHTML;

             galleryTitle.textContent = 'Video';

             setActiveButton(this);
         });




         showAllGalleries();
         setActiveButton(showAllButton);
     });
 </script>
