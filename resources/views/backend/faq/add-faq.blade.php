<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content bg-white">
        <a class="close custom-close" data-dismiss="modal" aria-label="Close">
            <em class="icon ni ni-cross"></em>
        </a>
        <div class="modal-header">
            <h5 class="modal-title">{{__('labels.add_faq')}}</h5>
        </div>
        <div class="modal-body">
            <form id="saveForm" action="{{ route('admin.faq.store') }}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="" />
                <div class="form-group">
                    <label class="form-label">{{__('labels.question')}}</label>
                    <div class="form-control-wrap">
                        <input type="text" name="question" class="form-control" placeholder="{{__('labels.enter_question')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">{{__('labels.answer')}}</label>
                    <div class="form-control-wrap">
                        <textarea name="answer" class="faq-description"></textarea>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="button" class="btn btn-primary me-1" id="saveBtn">{{__('labels.add')}}</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light custom-close" id="saveCancelBtn">{{__('labels.cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{!! JsValidator::formRequest('App\Http\Requests\Backend\FaqRequest','#saveForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}