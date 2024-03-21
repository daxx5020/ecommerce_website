<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroPageSection extends Model
{
    use HasFactory;

    protected $fillable = ['subheading','heading','description','image_path'];
}
