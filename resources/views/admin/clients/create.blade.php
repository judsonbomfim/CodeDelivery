@extends('app')

@section('content')
    <div class="container">
        <h3>Novo CLiente</h3>

        @include('errors._check')

        {!! Form::open(['route'=>'admin.clients.store', 'class'=>'form']) !!}

        @include('admin.clients._form')
        <div class="form-group">
            {!! Form::submit('Criar Clientes', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection