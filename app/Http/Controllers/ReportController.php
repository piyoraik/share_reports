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
		public function create(Request $request)
		{
			$rules = [
				"rp_date" 			=> ['required'],
				"rp_time_from" 	=> ['required'],
				"rp_time_to"		=> ['required'],
				"rp_content"		=> ['required'],
				"reportcate_id"	=> ['required'],
			];
			$this->validate($request, $rules);

			$report = Report::create([
				"rp_date" 			=> $request->rp_date,
				"rp_time_from" 	=> $request->rp_time_from,
				"rp_time_to"		=> $request->rp_time_to,
				"rp_content"		=> $request->rp_content,
				"reportcate_id"	=> $request->reportcate_id,
				"user_id"				=> $request->session()->get('id'),
				"rp_created_at" => date("Y-m-d H:i:s"),
			]);

			return redirect(route('reportShow',['id' => $report->id]));
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
