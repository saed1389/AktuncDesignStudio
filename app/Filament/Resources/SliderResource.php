<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Ayarlar';

    protected static ?string $label = 'Slider';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_tr')
                    ->label('Başlık (TR)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->label('Başlık (EN)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Görsel Seçiniz')
                    ->directory('uploads/aktunc')
                    ->reorderable()
                    ->image()
                    ->hint('*Resim boyutu 2850*1600 piksel olmalıdır')
                    ->hintColor('danger')
                    ->imageEditor()
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditorViewportWidth('2850')
                    ->imageEditorViewportHeight('1600')
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
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name_tr')
                    ->label('Başlık (TR)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Başlık (TR)')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Durum')
                    ->afterStateUpdated(function ($record, $state) {
                        Notification::make()
                            ->title('Durum Güncellendi')
                            ->body("**{$record->name_tr}** Slider durumu **" . ($state ? 'Aktif' : 'Pasif') . "** olarak güncellendi.")
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
                    Tables\Actions\EditAction::make()->label('Düzenle'),
                    Tables\Actions\DeleteAction::make()->label('Sil'),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
