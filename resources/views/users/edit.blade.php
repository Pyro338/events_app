@extends('layouts.app')

@section('content')
    @if(Auth::user()->id !== $user->id)
        {{redirect('home')}}
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">Редактировать профиль {{$user->name}} {{$user->last_name}}</h1>
                        </div>
                        <form action="{{route('user.update', $user)}}" method="post" class="form-horisontal">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Логин (Email)</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        value="{{$user->email}}"
                                        required
                                        placeholder="Email"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        value="{{$user->name}}"
                                        required
                                        placeholder="Имя"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Фамилия</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="last_name"
                                        value="{{$user->last_name}}"
                                        required
                                        placeholder="Фамилия"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="birthday">День рождения</label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        name="birthday"
                                        value="{{$user->birthday}}"
                                        required
                                        placeholder="День рождения"
                                    >
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Сохранить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
