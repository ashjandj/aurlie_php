var selectedFileId = '';
var selectedFilePath = '';
var selectedFilePathUrl = '';
var uploadType = '';
var uploadedById = ''
var userType = ''
var cropped = false;
var acceptedFileType = $('#accepted-type').html();

// modal window template
var modalTemplate = `
<div class="modal" id="imageCropperModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="imageCropperModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-white">
        <div class="modal-header">
            <h5 class="modal-title" id="addindustyModal">Crop Image</h5>
            <button type="button" class="close close-modal" data-close_id="imageCropperModal" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </button>
        </div>
        <div class="modal-body">
            <div id="image_container">
                <img alt="image" src="" id="crop_image" class="img-responsive" height="auto" width="100%" />
            </div>
            <input type="hidden" id="imageBaseCode">
            <input type="hidden" id="image_type" value="">

            <input type="hidden" id="__previewId">
            <input type="hidden" id="__base64InputId">
            <input type="hidden" id="__fileInputId">
            <input type="hidden" id="__imageHeight">
            <input type="hidden" id="__imageWidth">
            <input type="hidden" id="__aspectRatio">
            <input type="hidden" id="__cropBoxResizable">
            <input type="hidden" id="__cropperZoomable">
            <input type="hidden" id="__cropperZoomOnWheel">
            <input type="hidden" id="__extension">
            <input type="hidden" id="__section" value="admin">

            <div class="clearfix"></div>
            <div class="progress progress123 mt-3" style="display: none;">
                <div class="progress-bar bar bar123 bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn ripple-effect-dark btn-primary imageCropbtn text-uppercase" id="cropButton">Crop Image</button>
            <button type="button" class="btn ripple-effect-dark btn-light text-uppercase close-modal" data-close_id="imageCropperModal" data-dismiss="modal" id="cancelCrop">Cancel</button>
        </div>
    </div>
</div>
</div>`;

// Opening media manager div
$('#mediaManagerBtn, #mediaManagerSideBtn').on('click', function () {     
    uploadedById = $(this).data('id');
    uploadType = $(this).data('type');
    userType = $('#userType').val();
    $("#mediaManagerModal").modal("show");
    $('#addSelectedBtn').attr('disabled',false);
    if (uploadType == 'default') {
        $('#addSelectedBtn').attr('disabled','disabled');
    }
    if (this.id == 'mediaManagerSideBtn') {
        $('#select-file').addClass('d-none')
        $('#upload-new').trigger('click')
    } else {
        $('#select-file').trigger('click')
        getMediaDivContent(uploadedById);
    }
})

// On clicked select file div
$('#select-file').on('click', function () {
    $('#select-file').addClass('modal-title-color')
    $('#upload-new').removeClass('modal-title-color')
    getMediaDivContent(uploadedById);
    $("#addSelectedBtn").removeClass('d-none');
    $("#select-items").removeClass('d-none');
    $("#browse-file").removeClass('d-block');
    $('#uploadFileFrm').trigger("reset");
    $('#imagePreview').attr('src', ''); 
})

// On clicked upload new div
$('#upload-new').on('click', function () {
    $('#upload-new').addClass('modal-title-color')
    $('#select-file').removeClass('modal-title-color')
    $("#select-items").addClass('d-none');
    $("#addSelectedBtn").addClass('d-none');
    $("#browse-file").addClass('d-block');
    $(".dz-preview").remove();
    $(".dz-default.dz-message").css({'display':'block'});  
})

// File selection
$(document).on('click', ".fileSelected", function () {
    $(".fileSelected").removeClass('item-border');
    $(this).addClass('item-border');
    selectedFileId = $(this).data('id');
    selectedFilePath = $(this).data('path');
    selectedFilePathUrl = $(this).data('path-url');
})

// Add the selected file and map it to the specific instance
$("#addSelectedBtn").on("click", function () {
    if (selectedFileId) {
        if (uploadType == 'profile_image') {
            var allowedExtn = ["png", "jpg", "jpeg"];
            if (validate(selectedFilePath, allowedExtn)) {
                $("#mediaManagerModal").modal("hide");
                $('#addImagePreviewDiv').attr('src', selectedFilePathUrl);
                $('#editImagePreviewDiv').attr('src', selectedFilePathUrl);
                $('#addUploadedImage').attr('value', selectedFilePath);
                $('#editUploadedImage').attr('value', selectedFilePath);
            }
        }
    } else {
        errorToaster('Please select file')
    }
});

$("#fileUploadBtn").on('click', (function (e) {
    e.preventDefault();
    var frm = $('#uploadFileFrm');
    var btn = $('#fileUploadBtn');
    var btnName = btn.html();
    var formData = new FormData(frm[0]);
    if (formData.get('file')) {
        var file = imageBase64toFile(formData.get('file'), 'image');
        formData.delete('file');
        formData.append("file", file); // remove base64 image content
    }
    
    showButtonLoader(btn, btnName, 'disabled');
    $.ajax({
        url: frm.attr('action'),
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            showButtonLoader(btn, btnName, false);
            $('#uploadFileFrm').trigger("reset");
            $('#imagePreview').attr('src', '');
            successToaster(response.message);
            getMediaDivContent(uploadedById);
        },
        error: function (err) {
            showButtonLoader(btn, btnName, false);
            var obj = JSON.parse(err.responseText);
            errorToaster(obj.message)
            for (var x in obj.errors) {
                $('#' + x + '-error').html(obj.errors[x][0]);
                $('#' + x + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
            }
        },
    });

}));

$(document).on('click', ".deleteBtn", function () {
    let id = $(this).data('media-id');
    var uploadedById =  $(this).data('user-id');
    if (userType == 'user') {
        var url = route('media.delete',{id}) ;
    } else {
        var url = route('admin.media.delete',{id}) ;
    }
   
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: url,
                success: function (data) {
                    if (data.success) {
                        Swal.fire(
                            'Deleted!',
                            'File has been deleted.',
                            "success"
                        )
                        getMediaDivContent(uploadedById);
                    }
                },
                error: function (err) {
                    handleError(err);
                },
                complete: function() {
                }
            });
        }
    });
})

$('#mediaManagerModal').on('hidden.bs.modal', function (e) {
    getMediaDivContent(uploadedById);
});

// Get files for media manager div
function getMediaDivContent(id, page = '') {
    $('#image-card-container').html('');
    if (userType == 'user') {
        var url = route('media.view') ;
    } else {
        var url = route('admin.media.view') ;
    }
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            id: id,
            page: page
        },
        beforeSend: function () {
            $('#image-card-container').html(`<div class="loader-overlay"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>`)
        },
        success: function (response) {
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
}

// Validate media according to the allowed extensions
function validate(file, allowedExtn) {
    if (file) {
        var ext = file.split(".");

        ext = ext[ext.length - 1].toLowerCase();
        var arrayExtensions = allowedExtn;

        if (arrayExtensions.lastIndexOf(ext) == -1) {
            errorToaster('Invalid file type')
            $("#uploadImage").val("");
            return false;
        }
        return true;
    } else {
        errorToaster('Please choose a file to upload')
    }
}

window.getCropperModal = function () {
    return $(modalTemplate);
}


// Pagination link
$(document).on('click', '.paginations a', function (event) {
    event.preventDefault();
    $('li').removeClass('active');
    $(this).parent('li').addClass('active');
    var page = $(this).attr('href').split('page=')[1];
    if (uploadedById == '') {
        uploadedById = userId
    }
    $('.mediaSidebar').addClass('active');
    getMediaDivContent(uploadedById, page); 
});

// To prevent multiple backdrop 
$(document).on('DOMContentLoaded', function () {
    var fileInput = $('#selectedFiles');

    $(document).on('change', fileInput, function () {
        const modalBackdrops = document.querySelectorAll('.modal-backdrop.show');

        // Check if there are more than one modal-backdrop show elements
        if (modalBackdrops.length > 1) {
            // Keep the first element and remove the rest
            for (let i = 2; i < modalBackdrops.length; i++) {
                modalBackdrops[i].remove();
            }
        }
    });
});

Dropzone.options.uploadFileFrm = {
    autoProcessQueue: false,
    acceptedFiles: acceptedFileType, 
    maxFileSize:1,
    resizeWidth: 150,
    resizeHeight: 150,
    uploadMultiple: false,
    init: function () {
        var dropzoneInstance = this;

        // listen to addedfile event
        dropzoneInstance.on('addedfile', function (file) {
            if (file.type === 'application/pdf' || file.type === 'application/msword' || file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                dropzoneInstance.options.autoQueue = false; // need to set false to prevent dropzone default queue error
                if (file.status === 'added') {
                    file.status = 'success';
                    if (bytesToMB(file.size) <= 1) {
                        dropzoneInstance.processFile(file);
                    }
                } 
            } else {
                if (['png', 'jpg', 'jpeg', 'pdf'].includes(file.name.split('.').pop().toLowerCase())) { // Check for image types
                    if (bytesToMB(file.size) <= 1) {
                        dropzoneInstance.options.autoQueue = true;
                        // to prevent infinite loop
                        if (file.cropped) {
                            return;
                        }
                        var cachedFilename = file.name;
                        dropzoneInstance.removeFile(file);
    
                        var $cropperModal = $(modalTemplate);
                        var $uploadCrop = $cropperModal.find('#cropButton');
                        var $cancelCrop = $cropperModal.find('.close-modal');
    
                        var $img = $('<img />');
                        var reader = new FileReader();
                        reader.onloadend = function () {
                            // add uploaded and read image to modal
                            $cropperModal.find('#image_container').html($img);
                            $img.attr('src', reader.result);
    
                            // image cropper config
                            $img.cropper({
                                aspectRatio: 1 / 1,
                                autoCropArea: 0,
                                movable: false,
                                cropBoxResizable: false,
                                resize: false,
                                strict: true,
                                highlight: false,
                                dragCrop: true,
                                zoomable: true,
                                zoomOnTouch: false,
                                zoomOnWheel: true,
                                dragMode: 3,
                                minContainerWidth:300,
                                minContainerHeight:300,
                                minCanvasWidth: 300,
                                minCanvasHeight: 300,
                                minCropBoxWidth: 150,
                                minCropBoxHeight: 150,
                            });
                        };
                        reader.readAsDataURL(file);
    
                        $cropperModal.modal('show');
    
                        $uploadCrop.on('click', function() {
                            var blob = $img.cropper('getCroppedCanvas').toDataURL();
                            var newFile = dataURItoBlob(blob);
                            newFile.cropped = true;
                            newFile.name = cachedFilename;
    
                            // add cropped file to dropzone
                            dropzoneInstance.addFile(newFile);
                            // upload cropped file with dropzone
                            dropzoneInstance.processQueue();
                            $cropperModal.modal('hide');
                        });
                        
                        $cancelCrop.on('click', function() {
                            $cropperModal.modal('hide');
                        });
                    }
                }
            }
            
        });
        dropzoneInstance.on('error', function(file, response) {
            errorToaster(response.message ?? response)
            $(file.previewElement).find('.dz-error-message').text(response.message);
        });
        dropzoneInstance.on('success', function(file, response) {
            successToaster(response.message)
        });
        
    }
};

// transform cropper dataURI output to a Blob which Dropzone accepts
window.dataURItoBlob = function (dataURI) {
    var byteString = atob(dataURI.split(',')[1]);
    var ab = new ArrayBuffer(byteString.length);
    var ia = new Uint8Array(ab);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }
    return new Blob([ab], { type: 'image/jpeg' });
}

window.bytesToMB = function (bytes) {
    if (typeof bytes !== 'number' || isNaN(bytes) || bytes < 0) {
      return 'Invalid input';
    }
  
    const megabytes = bytes / (1024 * 1024); // 1 MB = 1024 * 1024 bytes
    return parseFloat(megabytes.toFixed(2));
  }


