@extends('adminlte::page')

@section('css')
    <style>
        option:checked {
            color: white;
            background: #007bff;
        }

    </style>
@stop

@section('content_header')
    <h3>Категории клиентов</h3>
@stop

@section('content')

    <form action="/admin" method="POST" class="py-3">
        @csrf

        <x-adminlte-select id="categories" name="categories[]" label="Выберите категории:" label-class="text-dark"
            multiple size="{{ $categories->count() }}">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-lg fa-user"></i>
                </div>
            </x-slot>
            @foreach ($categories as $category)
                <option {{ in_array($category->id, old('categories') ?: []) ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </x-adminlte-select>
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
@stop
