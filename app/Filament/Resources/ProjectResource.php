<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Models\SubCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationGroup = 'Proje İşlemleri';

    protected static ?string $label = 'Projeler';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Ana Kategori')
                    ->relationship('category', 'name_tr')
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('sub_category_id', null))
                    ->required(),
                Forms\Components\Select::make('sub_category_id')
                    ->label('Alt Kategori')
                    ->relationship('category', 'name_tr')
                    ->options(fn (callable $get) => SubCategory::where('category_id', $get('category_id'))->pluck('name_tr', 'id'))
                    ->afterStateUpdated(fn(callable $set) => $set('series_id', null))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('city_id')
                    ->label('Şehir Adı')
                    ->relationship('city', 'name_tr')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('name_tr')
                    ->label('Proje Adı (TR)')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    })
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Proje Adı (TR)')
                    ->disabled()
                    ->dehydrated()
                    ->unique(Project::class, 'slug', ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->label('Proje Adı (EN)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_name')
                    ->label('Müşteri')
                    ->maxLength(255),
                Forms\Components\TextInput::make('year')
                    ->label('Yıl')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('area')
                    ->label('Alan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('images')
                    ->label('Resimler')
                    ->directory('uploads/aktunc')
                    ->reorderable()
                    ->image()
                    ->hint('*Resim boyutu 1110*625 piksel olmalıdır')
                    ->hintColor('danger')
                    ->imageEditor()
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditorViewportWidth('1110')
                    ->imageEditorViewportHeight('625')
                    ->panelLayout('grid')
                    ->multiple()
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->label('Durum')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_tr')
                    ->label('Proje Adı')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name_tr')
                    ->label('Ana Kategori')
                    ->sortable(),
                Tables\Columns\TextColumn::make('subCategory.name_tr')
                    ->label('Alt Kategori')
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Yıl')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area')
                    ->label('Alan')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Durum')
                    ->afterStateUpdated(function ($record, $state) {
                        Notification::make()
                            ->title('Durum Güncellendi')
                            ->body("**{$record->name_tr}** Projesinin durumu **" . ($state ? 'Aktif' : 'Pasif') . "** olarak güncellendi.")
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
