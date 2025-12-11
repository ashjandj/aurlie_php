@props(['id', 'title', 'bodyId'])

<div class="modal fade zoom" tabindex="-1" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a class="close custom-close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ $title }}
                </h5>
            </div>
            <div class="modal-body" id="{{ $bodyId }}">
            </div>
        </div>
    </div>
</div>
