<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Watch Video') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <a data-toggle="modal" data-target="#viewvideourlmodal-{{ $video->id }}"
                    href="https://www.youtube.com/watch?v={{ $video->video_url }}" target="_blank">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $video->video_url }}"
                        frameborder="0" allowfullscreen style="pointer-events: none;"></iframe>
                </a>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
        </div>
    </div>
</div>
