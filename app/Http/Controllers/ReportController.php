<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\ReportCate;

class ReportController extends Controller
{
    // GET INDEX
		public function index()
		{
			$templatePath = "reports.index";
			$assign = [];

			return view($templatePath, $assign);
		}
}
