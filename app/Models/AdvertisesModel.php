<?php

namespace App\Models;

use App\Models\CategoriesModel;
use App\Models\PhotosModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdvertisesModel extends Model
{
    protected $table = 'advertises';
    protected $fillable = ['title', 'slug', 'user_id', 'price', 'negotiate', 'descritpion', 'contact', 'views', 'state_id', 'category_id', 'created_at'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoriesModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(PhotosModel::class, 'advertise_id');
    }
}
