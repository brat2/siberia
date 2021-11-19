@extends('adminlte::page')

@section('content')
    <form action="">
        <x-adminlte-select id="categories" name="categories[]" label="Категории" label-class="text-danger" multiple>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-red">
                    <i class="fas fa-lg fa-user"></i>
                </div>
            </x-slot>
            <option>Администраторы</option>
            <option>Модераторы</option>
            <option>Редакторы</option>
            <option>Гости</option>
        </x-adminlte-select>
    </form>
@stop
