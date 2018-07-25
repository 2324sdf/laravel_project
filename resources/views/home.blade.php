@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Админка</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Добро пожаловать! Администратор!
                </div>
                <div class="panel-body">
                    <a class="btn btn-primary" href="{{ url('/') }}">Главная</a>
                    <a class="btn btn-primary" href="{{ url('/news') }}">Новости</a>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
