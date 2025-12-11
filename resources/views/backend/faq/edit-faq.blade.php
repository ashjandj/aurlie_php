<form id="updateForm" action="{{ route('admin.faq.update', customEncrypt($faq->id)) }}" method="POST">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PUT">
    <input type="hidden" name="id" value="{{ customEncrypt($faq->id) }}" />
    <div class="form-group">
        <label class="form-label">{{__('labels.question')}}</label>
        <div class="form-control-wrap">
            <input type="text" name="question" class="form-control" placeholder="{{__('labels.enter_question')}}" value="{{$faq->question}}">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">{{__('labels.answer')}}</label>
        <div class="form-control-wrap">
            <textarea name="answer" class="faq-description">{{$faq->answer}}</textarea>
        </div>
    </div>
    <div class="form-group text-end">
        <button type="button" class="btn btn-primary me-1" id="updateBtn">{{__('labels.update')}}</button>
        <button type="button" data-dismiss="modal" class="btn btn-light custom-close" id="updateCancelBtn">{{__('labels.cancel')}}</button>
    </div>
</form>

{!! JsValidator::formRequest('App\Http\Requests\Backend\FaqRequest','#updateForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}