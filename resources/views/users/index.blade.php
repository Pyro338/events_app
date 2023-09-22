@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">
                                Пользователи
                            </h1>
                        </div>
                        <table class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>День рождения</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{route('user', $user)}}">
                                                {{$user->name}} {{$user->last_name}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="mailto{{$user->email}}">
                                                {{$user->email}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$user->birthday}}
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
