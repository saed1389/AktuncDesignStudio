<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'Ayarlar';

    protected static ?string $label = 'Ayarlar';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('site_name')
                    ->label('Website Adı')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->directory('uploads/aktunc')
                    ->image()
                    ->hint('*Resim boyutu 120*40 piksel olmalıdır')
                    ->hintColor('danger')
                    ->disk('public')
                    ->visibility('public')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('E-posta')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook_url')
                    ->label('Facebook URL')
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram_url')
                    ->label('Instagram URL')
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitter_url')
                    ->label('Twitter URL')
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('linkedin_url')
                    ->label('Linkedin URL')
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone1')
                    ->label('Telefon 1')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone2')
                    ->label('Telefon 2')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label('Adres')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('about_us_tr')
                    ->label('Hakkımızda (TR)')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('about_us_en')
                    ->label('Hakkımızda (EN)')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('vision_tr')
                    ->label('Vizyonumuz (TR)')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('vision_en')
                    ->label('Vizyonumuz (EN)')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('mission_tr')
                    ->label('Misyonumuz (TR)')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('mission_en')
                    ->label('Misyonumuz (EN)')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Website Adı')
                    ->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
