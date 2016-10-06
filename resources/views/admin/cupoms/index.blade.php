@extends('app')

@section('content')
    <div class="container">
        <h3>Cupoms</h3>

        <a href="{{ route('admin.cupoms.create') }}" class="btn btn-default">Nova Cupom</a>
        <br><br>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thread>
            <tbory>
                @foreach($cupoms as $cupom)
                <tr>
                    <td>{{ $cupom->id }}</td>
                    <td>{{ $cupom->code }}</td>
                    <td>{{ $cupom->value }}</td>
                    <td>
                        <a href="{{ route('admin.cupoms.edit', ['id'=>$cupom->id]) }}" class="btn btn-default btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbory>
        </table>
        {!! $cupoms->render() !!}
    </div>
@endsection