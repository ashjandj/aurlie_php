<div class="row g-4">
<div></div>
  @forelse ($medias as $media)
  <div class="image-card col-2" id="image-card-{{$media->id}}">
    <div class="border border-1 image-card-box-shadow rounded modal-img-des">
      <div class="drodown">
        <div class="d-flex justify-content-end">
          <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
            <em class="icon-small ni ni-more-v"></em>
          </a>
          <div class="dropdown-menu dropdown-menu-start">
            @php
            $downloadRoute = getLoggedInUserDetail() && getLoggedInUserDetail()->user_type == 'admin'
            ? route('admin.media.download', customEncrypt($media->id))
            : route('media.download', customEncrypt($media->id));
            @endphp
            <ul class="link-list-opt no-bdr p-0">
              <li>
                @if ((!isTypeUser() && auth()->user()->hasPermissionTo('admin.media.delete')) || isTypeUser())
                <a class="deleteBtn" data-media-id="{{customEncrypt($media->id)}}" data-user-id="{{getLoggedInUserDetail()->id}}"><em class="icon ni ni-trash"></em><span>{{__('labels.delete')}}</span></a>
                @endif
                @if ((!isTypeUser() && auth()->user()->hasPermissionTo('admin.media.download')) || isTypeUser())
                <span class="downloadBtn {{ in_array(getFileType(pathinfo($media->path, PATHINFO_EXTENSION)), ['pdf', 'doc']) || Storage::disk('local')->exists($media->path) ? '' : 'd-none' }}">
                  <a href="{{ $downloadRoute }}"><em class="icon ni ni-download"></em><span>{{__('labels.download_media')}}</span></a>
                </span>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="d-flex image-cards-design justify-content-center m-2 align-items-center">
        <div>
          @if (getFileType(pathinfo($media->path, PATHINFO_EXTENSION)) == 'doc')
          <a href="#"><img id="selectedFile-{{$media->id}}" class="fileSelected" data-id="{{$media->id}}" data-path-url="{{Storage::url($media->path)}}" data-path="{{$media->path}}" src="{{ asset('assets/images/document-thumb.png')}}" alt="alt"></a>
          @elseif (getFileType(pathinfo($media->path, PATHINFO_EXTENSION)) == 'pdf')
          <a href="#"><img id="selectedFile-{{$media->id}}" class="fileSelected" data-id="{{$media->id}}" data-path-url="{{Storage::url($media->path)}}" data-path="{{$media->path}}" src="{{ asset('assets/images/pdf-thumb.jpg')}}" alt="alt"></a>
          @else
          <a href="#"><img id="selectedFile-{{$media->id}}" class="fileSelected imageFile" data-id="{{$media->id}}" data-path-url="{{Storage::url($media->path)}}" data-path="{{$media->path}}" src="{{$media->media_url}}" alt="alt"></a>
          @endif
        </div>
      </div>
      <div class="card-body">
        <p class="image-name m-0 font-weight-bold">{{$media->path ? nameConversion($media->path) : '' }}</p>
      </div>
    </div>
  </div>
  @empty
  <p>{{__('message.error.no_file_found')}}</p>
  @endforelse
</div>
<div class="paginations mt-4">
  {!! $medias->onEachSide(1)->links() !!}
</div>