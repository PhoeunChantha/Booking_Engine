@extends('backends.master')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('View Comment')}}</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h3 class="card-title text-uppercase">{{ __('Comment Details') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">{{__('Name')}}</label>
                                        <input type="text" id="name" value="{{$comment->customer_name }}" class="form-control" readonly>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="">{{__('Comment')}}</label>
                                        <textarea id="message" rows="7" class="form-control" readonly>{{ $comment->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                </button>
                                    <a href="{{ route('admin.comment.index') }}" class="btn btn-success float-right mr-2 btn-md btn-back"><i class="fa fa-undo mr-2"></i>{{__('Back')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection


