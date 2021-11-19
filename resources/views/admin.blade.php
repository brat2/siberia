@extends('adminlte::page')

@section('content')
    <form action="/admin" method="POST" class="py-5">
        @csrf
        <x-adminlte-select id="categories" name="categories[]" label="Категории клиентов" label-class="text-danger" multiple>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-lg fa-user"></i>
                </div>
            </x-slot>
            @foreach ($categories as $category)
                <option>{{ $category->name }}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-button class="btn-flat" type="submit" label="Отфильтровать" theme="success" />
    </form>

    {{-- Minimal example / fill data using the component slot --}}

    @php
    $heads = ['ID', 'Имя',  'Категории'];
    @endphp
    <x-adminlte-datatable id="table" :heads="$heads" head-theme="dark">
        @foreach ($users as $user)
            <tr>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->categories !!}</td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop
