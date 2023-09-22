@extends('layouts.app')

@section('content')
    @if(Auth::user()->id !== $event->author->id)
        {{redirect('home')}}
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">
                                Редактировать событие "{{$event->title}}"
                            </h1>
                        </div>
                        <form action="{{route('event.update', $event)}}" method="post" class="form-horisontal">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название события</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        value="{{$event->title}}"
                                        required
                                        placeholder="Название события"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="text">Описание события</label>
                                    <textarea
                                        name="text"
                                        id="text"
                                        rows="10"
                                        required
                                        class="form-control"
                                    >{{$event->text}}</textarea>
                                    <div class="form-group">
                                        <label for="date">Дата события</label>
                                        <input
                                            type="date"
                                            class="form-control"
                                            name="date"
                                            value="{{$event->date}}"
                                            required
                                            placeholder="Дата события"
                                        >
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Сохранить">
                                    <a href="{{route('event.show', $event->id)}}" class="btn btn-danger">Отмена</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
