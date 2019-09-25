@extends('layouts.app')

@section('content')
    <div class="panel"></div>
    <div class="panel panel-default">

        <div class="panel-body">

            @include('common.error')
            <form action="{{ url('task') }}" method="post" class="form-horizontal">

                <div class="form-group">

                    <label class="col-sm-3 control-label" for="name">Tasks</label>

                    <div class="col-sm-6">

                        <input type="text" name="name" id="name" class="form-control">

                    </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-offset-3 col-sm-6">

                        <button type="submit" class="btn btn-outline-primary">Add task</button>

                        {{ csrf_field() }}

                    </div>

                </div>

            </form>

        </div>

    </div>

    @if(count($tasks))

        <div class="panel panel-default">

            <div class="panel-heading">

                Current tasks

            </div>

            <div class="panel-body table-responsive">

                <table class="table table-striped">

                    <thead>

                        <th>Task</th>

                        <th>&nbsp;</th>

                    </thead>

                    <tbody>

                        @foreach($tasks as $task)

                            <tr>

                                <td>{{ $task->name }}</td>

                                <td>

                                    <form action="{{ url('task/' . $task->id) }}" method="post">

                                        <button class="btn btn-danger">Delete</button>

                                        {{ method_field('DELETE') }}

                                        {{ csrf_field() }}

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    @endif



@endsection