@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">
                                {{$user->name}} {{$user->last_name}}
                            </h1>
                        </div>
                        <div class="card-body">
                            <strong>
                                День рождения
                            </strong>
                            <div class="text-muted">
                                {{$user->birthday}}
                            </div>
                            <strong>
                                Email
                            </strong>
                            <div class="text-muted">
                                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                            </div>
                            <strong>
                                События
                            </strong>
                            <ul class="list-group list-group-unbordered mb-3">
                                @foreach($user->events as $event)
                                    <li class="list-group-item">
                                        <a href="{{route('event.show', $event)}}">{{$event->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if(@Auth::user()->id == $user->id)
                            <div class="card-footer">
                                <a href="{{route('user.edit', $user)}}" class="btn btn-primary">Редактировать</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
