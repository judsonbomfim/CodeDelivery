@extends('app')

@section('content')
    <div class="container">
        <h3>Categorias</h3>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Nova Categoria</a>
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
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['id'=>$category->id]) }}" class="btn btn-default btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbory>
        </table>
        {!! $categories->render() !!}
    </div>
@endsection