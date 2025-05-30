<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Ayarlar';

    protected static ?string $label = 'Ekip';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('İsim Soyisim')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('position_tr')
                    ->label('Pozisyon (TR)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('position_en')
                    ->label('Pozisyon (EN)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Görsel Seçiniz')
                    ->directory('uploads/aktunc')
                    ->image()
                    ->hint('*Resim boyutu 350*465 piksel olmalıdır')
                    ->hintColor('danger')
                    ->imageEditor()
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditorViewportWidth('350')
                    ->imageEditorViewportHeight('465')
                    ->panelLayout('grid')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Resim'),
                Tables\Columns\TextColumn::make('name')
                    ->label('İsim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position_tr')
                    ->label('Pozisyon')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Durum')
                    ->afterStateUpdated(function ($record, $state) {
                        Notification::make()
                            ->title('Durum Güncellendi')
                            ->body("**{$record->name_tr}** Ekip durumu **" . ($state ? 'Aktif' : 'Pasif') . "** olarak güncellendi.")
                            ->success()
                            ->send();
                    }),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Sıralama Düzeni'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturuldu')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Güncellendi')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ])

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
