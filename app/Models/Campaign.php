<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'category_id', 'target_donation', 'max_date', 'image', 'user_id', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function sumDonation()
    {
        return $this->hasMany(Donation::class)
        ->selectRaw('donations.campaign_id,SUM(donations.amount) as total')
        ->where('donations.status', 'success')->groupBy('donations.campaign_id');
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/campaigns/' . $value),
        );
    }

}
