<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PhotosModel extends Model
{
    protected $table = 'advertise_photos';
    protected $fillable = ['url', 'mainPhoto', 'advertise_id'];

    public function advertise(): BelongsTo
    {
        return $this->belongsTo(AdvertisesModel::class);
    }
}
