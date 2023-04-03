<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Brands;
use App\Leads;
use App\Status;
use Auth;
class LeadController extends Controller

{
	 
   public function store(Request $request)
	{
	$p = Projects::with('leads')->where('id', '=', $request->project_id)->first();
	
	if ($p->exists()) {
	   
	    Leads::create($request->all());
	    return redirect()->away($p->tesekkur_sayfasi);

	}else { return back(); }
	
}
	


}