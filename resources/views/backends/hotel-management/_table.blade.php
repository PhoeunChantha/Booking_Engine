<div class="card-body p-0 table-wrapper">
    <table class="table">
        <thead class="text-uppercase">
            <tr>
                <th >#</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Title') }}</th>
                {{-- <th>{{ __('Created By') }}</th> --}}
                @if (auth()->user()->can('hotelmanagement.edit'))
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($hotel_managements as $hotel_management)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="
                        @if ($hotel_management->image && file_exists(public_path('uploads/hotel_management/' . $hotel_management->image)))
                            {{ asset('uploads/hotel_management/'. $hotel_management->image) }}
                        @else
                            {{ asset('uploads/image/default.png') }}
                        @endif
                        " alt="" class="profile_img_table">
                    </td>
                    <td>
                        {{ $hotel_management->title }}
                    </td>
                    @if (auth()->user()->can('hotelmanagement.edit'))
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switcher_input status" id="status_{{ $hotel_management->id }}" data-id="{{ $hotel_management->id }}" {{ $hotel_management->status == "active" ? 'checked' : '' }} name="status">
                            <label class="custom-control-label" for="status_{{ $hotel_management->id }}"></label>
                        </div>
                    </td>
                    @endif
                    <td>
                        @if (auth()->user()->can('hotelmanagement.edit'))
                        <a href="{{ route('admin.hotel_management.edit', $hotel_management->id) }}" class="btn btn-info btn-sm btn-edit">
                            <i class="fas fa-pencil-alt"></i>
                            {{ __('Edit') }}
                        </a>
                        @endif
                        @if (auth()->user()->can('hotelmanagement.delete'))
                        <form action="{{ route('admin.hotel_management.destroy', $hotel_management->id) }}" class="d-inline-block form-delete-{{ $hotel_management->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-id="{{ $hotel_management->id }}" data-href="{{ route('admin.hotel_management.destroy', $hotel_management->id) }}" class="btn btn-danger btn-sm btn-delete">
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
                    {{ __('Showing') }} {{ $hotel_managements->firstItem() }} {{ __('to') }} {{ $hotel_managements->lastItem() }} {{ __('of') }} {{ $hotel_managements->total() }} {{ __('entries') }}
                </div>
                <div class="col-12 col-sm-6 pagination-nav pr-3"> {{ $hotel_managements->links() }}</div>
            </div>
        </div>
    </div>


</div>

