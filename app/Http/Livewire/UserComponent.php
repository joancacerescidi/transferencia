<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserComponent extends DataTableComponent
{


    public function configure(): void
    {
        $this->setPrimaryKey('id')->setAdditionalSelects(['users.id as id']);
    }
    public function builder(): Builder
    {
        return User::query()->where('type', '!=', 'admin');
    }
    public function columns(): array
    {
        return [

            Column::make('Nombre', 'name'),
            Column::make('Email', 'email')
                ->searchable(),
            Column::make('Tipo de Registro', 'type_auth'),

            Column::make('Tipo de usuario', 'type'),
            ButtonGroupColumn::make('Acción')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => $row->type == 'free' ? 'Payment' : 'Free')
                        ->location(fn ($row) => route('update.user', $row->id))
                        ->attributes(function ($row) {
                            return [

                                'class' => 'underline text-blue-500 hover:no-underline',
                            ];
                        }),
                ]),
        ];
    }
}
