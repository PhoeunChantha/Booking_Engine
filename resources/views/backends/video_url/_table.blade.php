<div class="card-body p-0 table-wrapper">
    <table class="table">
        <thead class="text-uppercase">
            <tr>
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Video') }}</th>
                <th>{{ __('Created By') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $video->name ?? 'empty' }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#viewvideourlmodal-{{ $video->id }}"
                            href="https://www.youtube.com/watch?v={{ $video->video_url }}" target="_blank">
                            <iframe width="200" height="100"
                                src="https://www.youtube.com/embed/{{ $video->video_url }}" frameborder="0"
                                allowfullscreen style="pointer-events: none;"></iframe>
                        </a>
                    </td>

                    <td>{{ $video->createdBy->name }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switcher_input status"
                                id="status_{{ $video->id }}" data-id="{{ $video->id }}"
                                {{ $video->status == 'active' ? 'checked' : '' }} name="status">
                            <label class="custom-control-label" for="status_{{ $video->id }}"></label>
                        </div>
                    </td>
                    <td>
                        {{-- <a href="#" class="btn btn-info btn-sm btn-modal btn-edit" data-toggle="modal"
                            data-container=".modal_form">
                            <i class="fas fa-pencil-alt"></i>
                            {{ __('Edit') }}
                        </a> --}}
                        <a href="#" data-href="{{ route('admin.video_url.edit', $video->id) }}"
                            class="btn btn-info btn-sm btn-modal btn-edit" data-toggle="modal"
                            data-container=".modal_form">
                            <i class="fas fa-pencil-alt"></i>
                            {{ __('Edit') }}
                        </a>
                        @if (auth()->user()->can('video.edit'))
                        @endif
                        <form action="{{ route('admin.video_url.destroy', $video->id) }}"
                            class="d-inline-block form-delete-{{ $video->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-id="{{ $video->id }}"
                                data-href="{{ route('admin.video_url.destroy', $video->id) }}"
                                class="btn btn-danger btn-sm btn-delete">
                                <i class="fa fa-trash-alt"></i>
                                {{ __('Delete') }}
                            </button>
                        </form>
                        @if (auth()->user()->can('video.delete'))
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-12 d-flex flex-row flex-wrap">
            <div class="row" style="width: -webkit-fill-available;">
                <div class="col-12 col-sm-6 text-center text-sm-left pl-3" style="margin-block: 20px">
                    {{ __('Showing') }} {{ $videos->firstItem() }} {{ __('to') }} {{ $videos->lastItem() }}
                    {{ __('of') }} {{ $videos->total() }} {{ __('entries') }}
                </div>
                <div class="col-12 col-sm-6 pagination-nav pr-3"> {{ $videos->links() }}</div>
            </div>
        </div>
    </div>


</div>
