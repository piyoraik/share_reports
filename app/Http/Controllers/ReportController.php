<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use App\Models\ReportCate;

class ReportController extends Controller
{
		// GET ADD
		public function add(Request $request)
		{
			$templatePath = "reports.add";
			$assign = [];

			$assign['reportCates'] = ReportCate::all();
			$session_user 		 = User::where("id", $request->session()->get('id'))->first();
			$assign['user']    = $session_user->us_name;

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
		public function index(Request $request)
		{
			$templatePath = "reports.index";
			$assign = [];

			$session_user 		 = User::where("id", $request->session()->get('id'))->first();
			$assign['reports'] = Report::orderBy("rp_date", "DESC")->paginate(3);
			$assign['user']    = $session_user->us_name;
			return view($templatePath, $assign);
		}

		// GET SHOW
		public function show(Request $request)
		{
			$templatePath = "reports.show";
			$assign = [];

			$session_user 		 = User::where("id", $request->session()->get('id'))->first();
			$assign['user']        = $session_user->us_name;
			$assign['report']  		 = Report::where("id", $request->id)->first();

			return view($templatePath, $assign);
		}

		// GET EDIT
		public function edit(Request $request)
		{
			$templatePath = "reports.edit";
			$assign = [];

			$session_user 		 		 = User::where("id", $request->session()->get('id'))->first();
			$assign['reportCates'] = ReportCate::all();
			$assign['user']        = $session_user->us_name;
			$assign['report']  		 = Report::where("id", $request->id)->first();

			return view($templatePath,$assign);
		}

		// PATCH UPDATE
		public function update(Request $request)
		{
			$rules = [
				"rp_date" 			=> ['required'],
				"rp_time_from" 	=> ['required'],
				"rp_time_to"		=> ['required'],
				"rp_content"		=> ['required'],
				"reportcate_id"	=> ['required'],
			];
			$this->validate($request, $rules);

			Report::find($request->id)->update([
				"rp_date" 			=> $request->rp_date,
				"rp_time_from" 	=> $request->rp_time_from,
				"rp_time_to"		=> $request->rp_time_to,
				"rp_content"		=> $request->rp_content,
				"reportcate_id"	=> $request->reportcate_id,
				"rp_created_at" => date("Y-m-d H:i:s"),
      ]);

			return redirect(route('reportShow',['id' => $request->id]));
		}

		// GET CONFIRM DELETE
		public function confirmdelete(Request $request)
		{
			$templatePath = "reports.confirmDelete";
			$assign = [];

			$session_user 	  = User::where("id", $request->session()->get('id'))->first();
			$assign['user'] 	= $session_user->us_name;
			$assign['report'] = Report::where("id", $request->id)->first();

			return view($templatePath,$assign);
		}

		// DELETE DELETE
		public function delete(Request $request)
		{
			Report::where("id", $request->id)->first()->delete();
			return redirect(route('reportIndex'));
		}
}
