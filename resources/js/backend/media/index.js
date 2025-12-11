let media = {
    init: function () {
        media.getMediaDivContent();
        media.showImage();
        media.hideImage();
    },

    /* Start function admin media view here */
    getMediaDivContent: function () {
        $('#image-card-container').html('');
        if (userType == 'user') {
            var url = route('media.view');
        } else {
            var url = route('admin.media.view');
        }
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: userId,
                page: ''
            },
            beforeSend: function () {
                $('#image-card-container').html(`<div class="loader-overlay"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>`)

            },
            success: function (response) {
                $('#image-card-container').html('')
                $('#image-card-container').html(response.data);
                if ($('.mediaSidebar').hasClass('active')) {
                    $('.fileSelected').removeClass('fileSelected')
                }
                $('.loader-overlay').addClass('d-none')
            },
            error: function (err) {
                handleError(err);
            }
        });
    },
    /* End function admin media view here */

    /* Start function admin showImage here */
    showImage() {
        $(document).on('click', '.imageFile', function () {
            const path = $(this).data('path-url');
            const imageHtml = `
            <div class="mfp-bg mfp-fade image-popup mfp-ready"></div>
            <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-fade image-popup mfp-ready" tabindex="-1" style="overflow: hidden auto;">
               <div class="mfp-container mfp-image-holder mfp-s-ready">
                  <div class="mfp-content">
                     <div class="mfp-figure">
                        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                        <figure>
                           <img class="mfp-img" alt="" src="${path}" style="max-height: 426px;">
                           <figcaption>
                              <div class="mfp-bottom-bar">
                                 <div class="mfp-title"></div>
                                 <div class="mfp-counter"></div>
                              </div>
                           </figcaption>
                        </figure>
                     </div>
                  </div>
                  <div class="mfp-preloader">Loading...</div>
               </div>
            </div>
            `;

            $('body').addClass('mfp-zoom-out-cur');
            $('#imagePopUp').html(imageHtml);
        });
    },
    /* End function admin showImage here */

    /* Start function admin hideImage here */
    hideImage() {
        $(document).on('click', '.mfp-close', function () {
            $('body').removeClass('mfp-zoom-out-cur');
            $('#imagePopUp').html('');
        });
        
        $(document).on('keydown', function(event) {
            if (event.which === 27) {
                $('body').removeClass('mfp-zoom-out-cur');
                $('#imagePopUp').html('');
            }
        });
    },
    /* End function admin hideImage here */

};

$(function () {
    media.init();
});
