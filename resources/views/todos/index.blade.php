@extends('layouts.app')
@section('title')
    <title>Todos - List</title>
@endsection
@section('content')
    <h1 class="text-center my-3">Todos Page</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif

            @if(Session::has('deleted_todo'))
                <div class="alert alert-danger">{{session('deleted_todo')}}</div>
            @endif
            <div class="card card-default">

                <div class="card-header font-weight-bold">
                    Todos
                </div>
                <div class="card-body">
                    @if($todos->count()>0)

                        <ul class="list-group">
                            @foreach($todos->all() as $todo)
                                @if($todo->completed == 0)
                                    <li class="list-group-item">

                                        {{$todo->name}}

                                        <a href="{{route('todos.show',$todo->id)}}"
                                           class="btn btn-info btn-sm float-right"><i class="fa fa-eye"></i> View</a>
                                        <form class="float-right mr-2" action="{{route('todos.completed',$todo->id)}}"
                                              method="post">
                                            @csrf

                                            <input type="hidden" name="completed" value=1>
                                            <button class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i>
                                                Completed
                                            </button>

                                        </form>
                                    </li>
                                @elseif($todo->completed == 1)
                                    <li class="list-group-item">

                                        {{$todo->name}}

                                        <a href="{{route('todos.show',$todo->id)}}"
                                           class="btn btn-info btn-sm float-right"><i class="fa fa-eye"></i> View</a>
                                        <form class="float-right mr-2" action="{{route('todos.completed',$todo->id)}}"
                                              method="post">
                                            @csrf

                                            <input type="hidden" name="completed" value=0>
                                            <button class="btn btn-outline-warning btn-sm"><i
                                                    class="fa fa-check"></i>
                                                Reset
                                            </button>
                                        </form>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        @if(route('todos.completed.index'))
                            <span class="font-weight-bold">You don't have any Completed Todos yet</span>

                            <a href="{{route('todos.index')}}" class="btn btn-info btn-sm float-right">Go to
                                Todos</a>

                            @else
                            <span class="font-weight-bold">You don't have any Todos yet</span>

                            <a href="{{route('todos.create')}}" class="btn btn-success btn-sm float-right">Create
                                Todos</a>
                        @endif

                    @endif
                </div>
                <div class="row justify-content-center">
                    {{$todos->render()}}
                </div>
            </div>

        </div>
    </div>
@endsection
