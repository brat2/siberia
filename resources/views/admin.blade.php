@extends('adminlte::page')

@section('css')
    <style>
        option:checked {
            color: white;
            background: #007bff;
        }

    </style>
@stop

@section('content')

    <form action="/admin" method="POST" class="py-5">
        @csrf

        <x-adminlte-select id="categories" name="categories[]" label="Категории клиентов" label-class="text-danger"
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


    @php
    $heads = ['ID', 'Имя клиента', 'Категории'];
    @endphp
    <x-adminlte-datatable id="table" :heads="$heads" head-theme="dark">
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>
                    @foreach ($client->categories as $category)
                        <div>{{ $category->name }}</div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop
