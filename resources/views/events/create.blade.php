@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Создать событие</h1>
    </div>
    <form action="{{route('event.store')}}" method="post" class="form-horisontal">
        {{csrf_field()}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <label for="title">Название события</label>
                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        required
                        placeholder="Название события"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="text">Описание события</label>
                    <textarea
                        name="text"
                        id="text"
                        rows="10"
                        required
                        class="form-control"
                    ></textarea>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="date">Дата события</label>
                    <input
                        type="date"
                        class="form-control"
                        name="date"
                        required
                        placeholder="Дата события"
                    >
                </div>
            </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary" value="Создать">
                        </div>
                    </div>
                </div>
        </div>
    </form>
@endsection
