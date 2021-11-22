@extends('adminlte::page')

@section('content_header')
    <h3>Категории клиентов</h3>
@stop

@section('content')

    <form action="/admin" method="POST" class="py-3">
        @csrf

        <x-adminlte-select2 id="categories" name="categories[]" label="Выберите категории:" label-class="text-dark"
            multiple>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-lg fa-user"></i>
                </div>
            </x-slot>
            @foreach ($categories as $category)
                <option {{ in_array($category->id, old('categories') ?: []) ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </x-adminlte-select2>


        <x-adminlte-button class="btn-flat" type="submit" label="Отфильтровать" theme="success" />
    </form>

    @if ($clients->isNotEmpty())

        <table class="table table-bordered">
            <thead class="bg-secondary
        ">
                <tr>
                    <th style="width: 20px">ID</th>
                    <th>Имя клиента</th>
                    <th>e-mail</th>
                    <th>Телефон</th>
                    <th style="width: 200px">Категории</th>
                </tr>
            </thead>
            <tbody class="bg-white
        ">
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>
                            @foreach ($client->categories as $category)
                                <div>{{ $category->name }}</div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
