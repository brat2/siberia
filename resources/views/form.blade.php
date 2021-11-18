@extends('adminlte::page')

<x-adminlte-select id="selUser" name="selUser[]" label="User" label-class="text-danger" multiple>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-red">
            <i class="fas fa-lg fa-user"></i>
        </div>
    </x-slot>
    <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger" />
    </x-slot>
    <option>Администраторы</option>
    <option>Модераторы</option>
    <option>Редакторы</option>
    <option>Гости</option>
</x-adminlte-select>
