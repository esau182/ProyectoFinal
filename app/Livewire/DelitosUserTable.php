<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Delito;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class DelitosUserTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Delito::query()
            ->with('user') 
            ->where('user_id', auth()->id());
    }

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
