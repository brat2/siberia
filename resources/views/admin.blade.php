@extends('adminlte::page')

@section('content')
    <form action="/admin" method="POST" class="py-5">
        @csrf
        <x-adminlte-select id="categories" name="categories[]" label="Категории клиентов" label-class="text-danger"
            multiple>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-success">
                    <i class="fas fa-lg fa-user"></i>
                </div>
            </x-slot>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-button class="btn-flat" type="submit" label="Отфильтровать" theme="success" />
    </form>

    {{-- Minimal example / fill data using the component slot --}}

    @php
    $heads = ['ID', 'Имя клиента', 'Категории'];
    @endphp
    <x-adminlte-datatable id="table" :heads="$heads" head-theme="dark">
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    @foreach ($user->categories as $category)
                        <div>{{ $category->name }}</div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
    <button class="test">test</button>
    <script>
        $(document).ready(function() {
            console.log(33);
            $('.test').click(function() {
                alert(22);
            });
        });
    </script>
@stop
