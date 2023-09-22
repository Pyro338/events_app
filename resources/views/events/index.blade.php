@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">События</h1>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Событие</th>
                                    <th>Создатель</th>
                                    <th>Дата</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>
                                            <a href="{{route('event.show', $event)}}">
                                                {{$event->title}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('user', $event->author->id)}}">
                                                {{$event->author->name}} {{$event->author->last_name}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$event->date}}
                                        </td>
                                        <td>
                                            @if(Auth::user()->id == $event->created_by)
                                                <a href="{{route('event.edit', $event)}}" class="btn btn-primary">
                                                    Редактировать
                                                </a>
                                            @else
                                                @if($event->users()->find(Auth::user()->id))
                                                    <a
                                                        href="{{route('event.unsubscribe', $event)}}"
                                                        class="btn btn-primary"
                                                    >
                                                        Отказаться
                                                    </a>
                                                @else
                                                    <a
                                                        href="{{route('event.subscribe', $event)}}"
                                                        class="btn btn-primary"
                                                    >
                                                        Учавствовать
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
