<div class="card-body p-0 table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Created By') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roomtypes as $roomtype)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $roomtype->name  }}</td>
                    <td>{{ $roomtype->createdby->name ?? 'null' }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switcher_input status"
                                id="status_{{ $roomtype->id }}" data-id="{{ $roomtype->id }}"
                                {{ $roomtype->status == 1 ? 'checked' : '' }} name="status">
                            <label class="custom-control-label" for="status_{{ $roomtype->id }}"></label>
                        </div>
                    </td>
                    <td>

                        @if (auth()->user()->can('gallery-roomtype.edit'))
                            <a href="#" data-href="{{ route('admin.roomtype.edit', $roomtype->id) }}"
                                class="btn btn-info btn-sm btn-modal btn-edit" data-toggle="modal"
                                data-container=".modal_form">
                                <i class="fas fa-pencil-alt"></i>
                                {{ __('Edit') }}
                            </a>
                        @endif

                        @if (auth()->user()->can('gallery-roomtype.delete'))
                            <form action="{{ route('admin.roomtype.destroy', $roomtype->id) }}"
                                class="d-inline-block form-delete-{{ $roomtype->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-id="{{ $roomtype->id }}"
                                    data-href="{{ route('admin.roomtype.destroy', $roomtype->id) }}"
                                    class="btn btn-danger btn-sm btn-delete">
                                    <i class="fa fa-trash-alt"></i>
                                    {{ __('Delete') }}
                                </button>
                            </form>
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
                    {{ __('Showing') }} {{ $roomtypes->firstItem() }} {{ __('to') }} {{ $roomtypes->lastItem() }}
                    {{ __('of') }} {{ $roomtypes->total() }} {{ __('entries') }}
                </div>
                <div class="col-12 col-sm-6 pagination-nav pr-3"> {{ $roomtypes->links() }}</div>
            </div>
        </div>
    </div>


</div>
