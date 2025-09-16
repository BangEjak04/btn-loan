<?php

namespace App\Filament\Resources\Applications\Schemas;

use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Initial')
                        ->schema([
                            Select::make('status')
                                ->required()
                                ->options([
                                    'prospect' => 'Prospect',
                                    'hot_prospect' => 'Hot Prospect',
                                    'user' => 'User',
                                ])
                                ->native(false)
                                ->live()
                                ->label('Status'),
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->label('Name'),
                            TextInput::make('email')
                                ->required()
                                ->email()
                                ->maxLength(255)
                                ->label('Email'),
                            TextInput::make('phone')
                                ->required()
                                ->tel()
                                ->label('Phone'),
                            TextInput::make('developer')
                                ->required()
                                ->maxLength(255)
                                ->label('Developer')
                                ->nullable(),
                            TextInput::make('location')
                                ->required()
                                ->maxLength(255)
                                ->label('Location')
                                ->nullable(),
                            Fieldset::make()
                                ->label('Price Range')
                                ->schema([
                                    TextInput::make('price_range_start')
                                        ->numeric()
                                        ->minValue(1)
                                        ->label('Start')
                                        ->prefix('Rp')
                                        ->nullable(),
                                    TextInput::make('price_range_end')
                                        ->numeric()
                                        ->minValue(1)
                                        ->label('End')
                                        ->prefix('Rp')
                                        ->nullable(),
                                ]),
                            MarkdownEditor::make('notes')
                                ->nullable()
                                ->maxLength(65535)
                                ->label('Notes'),
                        ])
                        ->description('Provide the basic details of the application.')
                        ->icon('heroicon-o-light-bulb'),
                    Step::make('Details')
                        ->hidden(fn(callable $get) => $get('status') !== 'user')
                        ->schema([
                            TextInput::make('address')
                                // ->required()
                                ->maxLength(255)
                                ->label('Address'),
                                Grid::make()
                                ->schema([
                            TextInput::make('land_area')
                                // ->required()
                                ->numeric()
                                ->minValue(1)
                                ->label('Land Area (m²)'),
                            TextInput::make('building_area')
                                // ->required()
                                ->numeric()
                                ->minValue(1)
                                ->label('Building Area (m²)'),
                                ]),
                            TextInput::make('price')
                                // ->required()
                                ->numeric()
                                ->minValue(1)
                                ->label('Price')
                                ->prefix('Rp'),
                                FileUpload::make('id_card')
                                // ->required()
                                ->label('ID Card')
                                ->image()
                                ->maxSize(2048)
                                ->imagePreviewHeight('250')
                                ->directory('id-cards'),
                            Select::make('payment_method')
                                // ->required()
                                ->options([
                                    'bank_transfer' => 'Bank Transfer',
                                    'credit_card' => 'Credit Card',
                                    'cash' => 'Cash',
                                    'other' => 'Other',
                                ])
                                ->native(false)
                                ->label('Payment Method'),
                            FileUpload::make('payment_proof')
                                ->label('Payment Proof')
                                ->image()
                                ->maxSize(2048)
                                ->imagePreviewHeight('250')
                                ->directory('payment-proofs'),
                        ])
                        ->description('Provide the basic details of the application.')
                        ->icon('heroicon-o-document'),
                ])
                    ->columnSpanFull(),
            ]);
    }
}
