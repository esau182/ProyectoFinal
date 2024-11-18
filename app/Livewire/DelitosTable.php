<?php

namespace App\Livewire;

use App\Models\Delito;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class DelitosTable extends DataTableComponent
{
    protected $model = Delito::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            ComponentColumn::make("Tipo", "tipoDelito")
                ->component('tables.tipoDelito')
                ->attributes(static fn(mixed $value, Delito $delito, Column $column) => [
                    'delito' => $delito,
                ])
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Usuario", "user_id")
                ->component('tables.usuario')
                ->attributes(static fn(mixed $value, Delito $delito, Column $column) => [
                    'delito' => $delito,
                ])
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Descripcion", "descripcion")
                ->component('tables.descripcion')
                ->attributes(static fn(mixed $value, Delito $delito, Column $column) => [
                    'delito' => $delito,
                ])
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Creado", "created_at")
                ->component('tables.created_at')
                ->attributes(static fn(mixed $value, Delito $delito, Column $column) => [
                    'delito' => $delito,
                ])
                ->sortable()
                ->searchable(),
            Column::make('hidden', 'longitud')
                ->setColumnLabelStatusDisabled()
                ->hideIf(true),
            ComponentColumn::make('Localización', "latitud")
                ->component('tables.localizacion')
                ->attributes(static fn(mixed $value, Delito $delito, Column $column) => [
                    'delito' => $delito 
                ])
                ->collapseAlways(),
            ComponentColumn::make("Acciones", "id")
                ->component('tables.acciones')
                ->attributes(static fn(mixed $value, Delito $delito, Column $column) => [
                    'delito' => $delito,
                ])
        ];
    }
}
