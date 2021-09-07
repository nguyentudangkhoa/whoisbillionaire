@extends('master.master')

@section('title', 'Create question')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Level') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Level') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Level') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(isset($level->id))
                                <form action="{{route('level.update', $level->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $level->id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputLevelName">{{ __('Level name') }}</label>
                                            <input type="text" class="form-control" name="name" value="{{ $level->name }}" id="inputLevelName" placeholder="{{ __('Enter level name') }}">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="inputLevelName">{{ __('Position') }}</label>
                                            <input type="text" class="form-control" name="position" value="{{ $level->position }}" id="inputLevelName" placeholder="{{ __('Enter level position') }}">
                                        </div>
                                        @error('position')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('level.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputLevelName">{{ __('Level name') }}</label>
                                            <input type="text" class="form-control" name="name" id="inputLevelName" placeholder="{{ __('Enter level name') }}">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="inputLevelName">{{ __('Position') }}</label>
                                            <input type="text" class="form-control" name="position" id="inputLevelName" placeholder="{{ __('Enter level position') }}">
                                        </div>
                                        @error('position')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
