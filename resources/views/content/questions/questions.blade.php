@extends('master.master')
@section('title', 'Questions')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Question')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Question')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Question table')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{route('question.create')}}">
                                <button type="button" class="btn btn-success">{{__('Create')}}</button>
                            </a>

                            <table id="data-question" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Questions') }}</th>
                                    <th>{{ __('Created at') }}</th>
                                    <th>{{ __('Updated at') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->created_at }}</td>
                                        <td>{{ $question->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('question.show', $question->id) }}"><button type="button" class="btn btn-success">{{__('Update')}}</button></a>
                                                <form action="{{ route('question.delete', $question->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
