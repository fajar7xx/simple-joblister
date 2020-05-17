<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Job extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
        'user_id',
        'category_id',
        'job_title',
        'url',
        'description',
        'location',
        'company',
        'salary',
        'contact_phone',
        'contact_email',
        'status'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function shortDescription()
    {
        return Str::words($this->description, 20);
    }

    public function currency()
    {
        $rupiah = "Rp " . number_format($this->salary,2,',','.');
        return $rupiah;
    }

    public function post_date()
    {
        $date = date('d-M-Y', strtotime($this->created_at));
        return $date;
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

}
