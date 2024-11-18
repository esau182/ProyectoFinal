<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Contacto;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class ContactosTable extends DataTableComponent
{
    protected $listeners = ['contactoEliminado' => '$refresh'];

    public function builder(): Builder
    {
        return Contacto::query()
        ->with('user') 
        ->where('contactos.user_id', auth()->id());
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            ComponentColumn::make("Numero", "numero")
                ->component('tables.numeroContacto')
                ->attributes(static fn(mixed $value, Contacto $contacto, Column $column) => [
                    'contacto' => $contacto,
                ])
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Registrado en fecha", "created_at")
                ->component('tables.createdContacto')
                ->attributes(static fn(mixed $value, Contacto $contacto, Column $column) => [
                    'contacto' => $contacto,
                ])
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Acciones", "id")
                ->component('tables.accionesContacto')
                ->attributes(static fn(mixed $value, Contacto $contacto, Column $column) => [
                    'contacto' => $contacto,
                ])
                ->sortable()
                ->searchable(),
        ];
    }
}
