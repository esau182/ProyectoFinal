<?php

namespace App\Livewire;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class UsuariosTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return User::query()
            ->with('contactos'); 
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            ComponentColumn::make("Nombre", "name")
                ->component('tables.nameUser')
                ->attributes(static fn(mixed $value, User $user, Column $column) => [
                    'user' => $user,
                ])
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Correo de contacto", "email")
                ->component('tables.correoUser')
                ->attributes(static fn(mixed $value, User $user, Column $column) => [
                    'user' => $user,
                ])
                ->sortable()
                ->searchable(),
            ComponentColumn::make('Contacto(s)', "id")
                ->component('tables.emergenciaUser')
                ->attributes(static fn(mixed $value, User $user, Column $column) => [
                    'user' => $user,
                ])
                ->sortable()
                ->collapseAlways(),
            ComponentColumn::make("Fecha de creación de usuario", "created_at")
                ->component('tables.createdUser')
                ->attributes(static fn(mixed $value, User $user, Column $column) => [
                    'user' => $user,
                ])
                ->sortable()
                ->searchable(),
        ];
    }
}
