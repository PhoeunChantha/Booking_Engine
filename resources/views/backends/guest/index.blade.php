@extends('backends.master')

@push('css')
    <style>
        .preview {
            margin-block: 12px;
            text-align: center;
        }
        .tab-pane {
            margin-top: 20px
        }
        .alphabet-filter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 2px;
            border-radius: 5px;
        }

        .filter-item {
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            font-size: 12px;
            color: #333;
            flex-grow: 1;
            transition: all 0.3s ease;
        }

        .filter-item:hover {
            background-color: #D0803D;
            color: white;
            border-color: #D0803D;
        }

        .all {
            background-color: ##D0803D;
            color: white;
        }

        .all:hover {
            background-color: #D0803D;
            border-color: #D0803D;
        }
        .filter-item.active {
            background-color: #D0803D;
            color: white;
            border-color: #D0803D;
        }
    </style>
@endpush
@section('contents')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>{{ __('Guest Management') }}</h3>
            </div>
            <div class="col-sm-6" style="text-align: right">
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card p-3">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <form action="" class="form-inline" method="get" id="search-form">
                            <input type="search" class="form-control form-control-sm " name="search_key" id="search" placeholder="Search guest by name or email">
                            <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div class="alphabet-filter">
                        @foreach (range('A', 'Z') as $letter)
                            <div class="filter-item p-2 mx-0" data-letter="{{ $letter }}">{{ $letter }}</div>
                        @endforeach
                        <div class="filter-item p-2 mx-0 active">ALL</div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item btn-modal" href="#" data-href="{{ route('admin.guest_management.create') }}" data-toggle="modal" data-container=".modal_form">
                                {{ __('Add New Guest') }}
                            </a>
                            <a class="dropdown-item" href="#">Download list</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    @include('backends.guest._table')
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade modal_form" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>

@endsection
@push('js')
<script>
    $('#search').on('keyup', function (e) {
        e.preventDefault();
        let search_key = $(this).val();
        $.ajax({
            url: '{{ route("admin.guest_management.index") }}',
            type: 'GET',
            data: {search_key: search_key},
            success: function(data) {
                $('#guest-table').html(data);
            },
            error: function() {
                console.log('Error reloading table');
            }
        });
    });

    $('.alphabet-filter .filter-item').on('click', function () {
        $('.alphabet-filter .filter-item').removeClass('active');

        $(this).addClass('active');

        let letter = $(this).data('letter');
        $.ajax({
            url: '{{ route("admin.guest_management.index") }}',
            type: 'GET',
            data: {alphabet: letter},
            success: function(data) {
                $('#guest-table').html(data);
            },
            error: function() {
                console.log('Error filtering by letter');
            }
        });
    });
    $('.btn_add').click(function (e) {
        var tbody = $('.tbody');
        var numRows = tbody.find("tr").length;
        $.ajax({
            type: "get",
            url: window.location.href,
            data: {
                "key" : numRows
            },
            dataType: "json",
            success: function (response) {
                $(tbody).append(response.tr);
            }
        });
    });

    $('.custom-file-input').change(function (e) {
        var reader = new FileReader();
        var preview = $(this).closest('.form-group').find('.preview img');
        console.log(preview);
        reader.onload = function(e) {
            preview.attr('src', e.target.result).show();
        }
        reader.readAsDataURL(this.files[0]);
    });

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();

        const Confirmation = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        Confirmation.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                console.log(`.form-delete-${$(this).data('id')}`);
                var data = $(`.form-delete-${$(this).data('id')}`).serialize();
                // console.log(data);
                $.ajax({
                    type: "post",
                    url: $(this).data('href'),
                    data: data,
                    // dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response.status == 1) {
                            $('.table-wrapper').replaceWith(response.view);
                            toastr.success(response.msg);
                        } else {
                            toastr.error(response.msg)

                        }
                    }
                });
            }
        });
    });

</script>
@endpush
