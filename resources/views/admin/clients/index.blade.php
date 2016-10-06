@extends('app')

@section('content')
    <div class="container">
        <h3>Clientes</h3>

        <a href="{{ route('admin.clients.create') }}" class="btn btn-default">Novo Cliente</a>
        <br><br>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thread>
            <tbory>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->user->name }}</td>
                    <td>
                        <a href="{{ route('admin.clients.edit', ['id'=>$client->id]) }}" class="btn btn-default btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbory>
        </table>
        {!! $clients->render() !!}
    </div>
@endsection