<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\ReportCate;

class ReportController extends Controller
{
		// GET ADD
		public function add()
		{
			$templatePath = "reports.add";
			$assign = [];

			$assign['reportCates'] = ReportCate::all();

			return view($templatePath, $assign);
		}

		// POST create
		public function cerate(Request $request)
		{
		}

    // GET INDEX
		public function index()
		{
			$templatePath = "reports.index";
			$assign = [];

			return view($templatePath, $assign);
		}

		// GET SHOW
		public function show(Request $request)
		{
			$templatePath = "reports.show";
			$assign = [];

			return view($templatePath, $assign);
		}

		// GET EDIT
		public function edit(Request $request)
		{
			$templatePath = "reports.edit";
			$assign = [];

			return view($templatePath,$assign);
		}

		// PATCH UPDATE
		public function update(Request $request)
		{
		}

		// GET CONFIRM DELETE
		public function confirmdelete(Request $request)
		{
			$templatePath = "reports.confirmDelete";
			$assign = [];

			return view($templatePath,$assign);
		}

		// DELETE DELETE
		public function delete(Request $request)
		{
		}
}
