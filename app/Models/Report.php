<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Report extends Model
{
    use HasFactory;

		public $timestamps = false;
		protected $fillable = [
			"rp_date",
			"rp_time_from",
			"rp_time_to",
			"rp_content",
			"rp_created_at",
			"reportcate_id",
			"user_id"
    ];

		public function user()
		{
			return $this->belongsTo(User::class);
		}
}
