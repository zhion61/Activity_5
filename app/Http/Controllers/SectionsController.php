<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SectionsController extends Controller{

	public function index()
	{
    	$categories = DB::table('sections')
    		->get();
    	return view('welcome')->compact("sections");
	}
	public function students(){
		if (Request()->has("section_id")){
			return DB::table("students")->leftJoin("payments","students.id","="
				,"payments.student.id")
			->where("section_id", request()->section_id)->get();
		}
	}
}