@extends('master.master')

@section('title', 'Create user')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Users') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Users') }}</li>
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
                                <h3 class="card-title">{{ __('Users') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(isset($user->id))
                                <form action="{{ route('user.edit', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">{{ __('User name') }}</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="inputName" placeholder="{{ __('Enter name') }}">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="inputEmail">{{ __('Email') }}</label>
                                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" id="inputEmail" placeholder="{{ __('Enter email') }}">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="inputPassword">{{ __('Password') }}</label>
                                            <input type="text" class="form-control" name="password" value="" id="inputPassword" placeholder="{{ __('Enter password') }}">
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('user.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">{{ __('User name') }}</label>
                                            <input type="text" class="form-control" name="name" value="" id="inputName" placeholder="{{ __('Enter name') }}">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="inputEmail">{{ __('Email') }}</label>
                                            <input type="text" class="form-control" name="email" value="" id="inputEmail" placeholder="{{ __('Enter email') }}">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="inputPassword">{{ __('Password') }}</label>
                                            <input type="text" class="form-control" name="password" value="" id="inputPassword" placeholder="{{ __('Enter password') }}">
                                        </div>
                                        @error('password')
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
