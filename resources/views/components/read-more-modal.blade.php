<!-- resources/views/components/ReadMoreModal.blade.php -->

@props(['id', 'dataId'])

<div class="modal fade" tabindex="-1" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <a class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('Read More') }}</h5>
            </div>
            <div class="modal-body">
                <p id="{{ $dataId }}"></p>
            </div>
        </div>
    </div>
</div>
