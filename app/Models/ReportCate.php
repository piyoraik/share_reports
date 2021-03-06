<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class ReportCate extends Model
{
		protected $table = 'reportcates';
    use HasFactory;

		public function reports()
		{
			return $this->hasMany(Report::class);
		}
}
