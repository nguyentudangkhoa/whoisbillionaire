@extends('master.master')

@section('title', 'Create question')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Question') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Question') }}</li>
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
                                <h3 class="card-title">{{ __('Question') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(isset($question->id))
                                <form action="{{ route('question.edit', $question->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $question->id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputQuestion">{{ __('Question') }}</label>
                                            <input type="text" class="form-control" name="question" value="{{ $question->question }}" id="inputQuestion" placeholder="{{ __('Enter question') }}">
                                        </div>
                                        @error('question')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerA">{{ __('Answer a') }}</label>
                                            <input type="text" class="form-control" name="answer_a" value="{{ $question->answer_a }}" id="inputAnswerA" placeholder="{{ __('Enter answer a') }}">
                                        </div>
                                        @error('answer_a')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerB">{{ __('Answer b') }}</label>
                                            <input type="text" class="form-control" name="answer_b" value="{{ $question->answer_b }}" id="inputAnswerB" placeholder="{{ __('Enter answer b') }}">
                                        </div>
                                        @error('answer_b')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerC">{{ __('Answer c') }}</label>
                                            <input type="text" class="form-control" name="answer_c" value="{{ $question->answer_c }}" id="inputAnswerC" placeholder="{{ __('Enter answer c') }}">
                                        </div>
                                        @error('answer_c')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerD">{{ __('Answer d') }}</label>
                                            <input type="text" class="form-control" name="answer_d" value="{{ $question->answer_d }}" id="inputAnswerD" placeholder="{{ __('Enter answer d') }}">
                                        </div>
                                        @error('answer_d')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputCorrectAnswer">{{ __('Correct Answer') }}</label>
                                            <input type="text" class="form-control" name="answer_right" value="{{ $question->answer_right }}" id="inputCorrectAnswer" placeholder="{{ __('Enter correct Answer') }}">
                                        </div>
                                        @error('answer_right')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputVoice">{{ __('Voice') }}</label>
                                            <input type="text" class="form-control" name="voice" value="{{ $question->voice }}" id="inputVoice" placeholder="{{ __('Enter voice') }}">
                                        </div>
                                        @error('voice')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">Level</label>
                                            <select class="custom-select form-control-border" id="level" name="level">
                                                @if (! isset($levels))
                                                    <option value="">{{ __('Levels have not added yet') }}</option>
                                                @else
                                                    @foreach ($levels as $level)
                                                        <option value="{{ $level->id }}">
                                                            {{ $level->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('level')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('question.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputQuestion">{{ __('Question') }}</label>
                                            <input type="text" class="form-control" name="question" id="inputQuestion" placeholder="{{ __('Enter question') }}">
                                        </div>
                                        @error('question')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerA">{{ __('Answer a') }}</label>
                                            <input type="text" class="form-control" name="answer_a" id="inputAnswerA" placeholder="{{ __('Enter answer a') }}">
                                        </div>
                                        @error('answer_a')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerB">{{ __('Answer b') }}</label>
                                            <input type="text" class="form-control" name="answer_b" id="inputAnswerB" placeholder="{{ __('Enter answer b') }}">
                                        </div>
                                        @error('answer_b')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerC">{{ __('Answer c') }}</label>
                                            <input type="text" class="form-control" name="answer_c" id="inputAnswerC" placeholder="{{ __('Enter answer c') }}">
                                        </div>
                                        @error('answer_c')
                                            <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAnswerD">{{ __('Answer d') }}</label>
                                            <input type="text" class="form-control" name="answer_d" id="inputAnswerD" placeholder="{{ __('Enter answer d') }}">
                                        </div>
                                        @error('answer_d')
                                            <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputCorrectAnswer">{{ __('Correct Answer') }}</label>
                                            <input type="text" class="form-control" name="answer_right" id="inputCorrectAnswer" placeholder="{{ __('Enter correct Answer') }}">
                                        </div>
                                        @error('answer_right')
                                            <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputVoice">{{ __('Voice') }}</label>
                                            <input type="text" class="form-control" name="voice" id="inputVoice" placeholder="{{ __('Enter voice') }}">
                                        </div>
                                        @error('voice')
                                            <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror

                                        <div class="form-group">Level</label>
                                            <select class="custom-select form-control-border" id="level" name="level">
                                                @if (! isset($levels))
                                                    <option value="">{{ __('Levels have not added yet') }}</option>
                                                @else
                                                    @foreach ($levels as $level)
                                                        <option value="{{ $level->id }}">
                                                            {{ $level->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('level')
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
