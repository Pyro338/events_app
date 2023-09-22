@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">
                                Событие "{{$event->title}}"
                            </h1>
                        </div>
                        <div class="card-body">
                            <strong>
                                Описание
                            </strong>
                            <div class="text-muted">
                                {{$event->text}}
                            </div>
                            <strong>
                                Дата
                            </strong>
                            <div class="text-muted">
                                {{$event->date}}
                            </div>
                            <strong>
                                Создатель
                            </strong>
                            <div class="text-muted">
                                <a href="{{route('user', $event->author->id)}}">
                                    {{$event->author->name}} {{$event->author->last_name}}
                                </a>
                            </div>
                            <strong>
                                Участники
                            </strong>
                            <ul class="list-group list-group-unbordered mb-3">
                                @foreach($event->users as $user)
                                    <li class="list-group-item">
                                        <a href="{{route('user', $user->id)}}">{{$user->name}} {{$user->last_name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            @if(@Auth::user()->id == $event->author->id)
                                <div class="form-group">
                                    <a href="{{route('event.edit', $event)}}" class="btn btn-primary">Редактировать</a>
                                </div>
                                <div class="form-group">
                                    <form onsubmit="if(confirm('Вы действительно хотите удалить событие?')){return true} else{return false}"  action="{{route('event.delete', $event)}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="submit" class="btn btn-danger" value="Удалить">
                                    </form>
                                </div>
                            @else
                                <div class="form-group">
                                    @if($event->users()->find(Auth::user()->id))
                                        <a href="{{route('event.unsubscribe', $event)}}" class="btn btn-primary">
                                            Отказаться
                                        </a>
                                    @else
                                        <a href="{{route('event.subscribe', $event)}}" class="btn btn-primary">
                                            Учавствовать
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
