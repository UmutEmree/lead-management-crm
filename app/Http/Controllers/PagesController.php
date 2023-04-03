<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Brands;
use App\Leads;
use App\Status;
use Auth;
use Carbon\Carbon;
class PagesController extends Controller

{
	   public function __construct()
    {
        $this->middleware('auth');
    }
    public function home(){
    	$now = Carbon::now();
       $id = Auth::user()->brand_id;
	   $projects = Projects::where('marka_id',$id)->with('brands')->paginate(20);
	   $bugun = Projects::where('marka_id',$id)->with('brands')->whereBetween('created_at', [$now->startOfMonth(),$now])->count();

	     foreach($projects as $p){
          $a[] = $p->leads->count();
          $total = array_sum($a);
      }
       return view('home')->with(compact('projects','total','bugun'));
}

    public function leads($id){
    	$user = Auth::user();
    	 $project = Projects::where('id',$id)->where('marka_id',$user->brand_id)->first();
    	 if (empty($project)){
    	 	return back();    	 }
    	 $projects = Projects::where('id',$id)->where('marka_id',$user->brand_id)->get();
    	 $filter = 'Seçiniz';
    	 $status = Status::all();
		return view('pages.leads')->with(compact('leads','status','projects','project','filter'));
	   }

     public function leadsFilter(Request $request,$id){
     $today = Carbon::today();
     $filter = $request->status;
     if($filter == 'tumu'){
          return redirect('proje/'.$id);
     }


      $user = Auth::user();
       $project = Projects::where('id',$id)->where('marka_id',$user->brand_id)->first();
       if (empty($project)){
        return back();       }
       $projects = Projects::where('id',$id)->where('marka_id',$user->brand_id)->get();
       $status = Status::all();
    return view('pages.filter-leads')->with(compact('leads','status','projects','project','today','filter'));
   }

     public function dateFilter(Request $request,$id){
     $today = Carbon::today();
     $filter = $request->status;
     if($filter == 'tumu'){
          return redirect('proje/'.$id);
     }
     $baslangic = $request->baslangic;
     $bitis     = $request->bitis;

      $user = Auth::user();
       $project = Projects::where('id',$id)->where('marka_id',$user->brand_id)->first();
       if (empty($project)){
        return back();       }
       $projects = Projects::where('id',$id)->where('marka_id',$user->brand_id)->get();
      

       $status = Status::all();
    return view('pages.filter-date')->with(compact('leads','status','projects','project','today','filter','baslangic','bitis','lead'));
   }
   
   public function leadsToday(Request $request,$id){
     $today = Carbon::today();
      $user = Auth::user();
       $project = Projects::where('id',$id)->where('marka_id',$user->brand_id)->first();
       if (empty($project)){
        return back();       }
         $filter = $request->status;
     if($filter == 'tumu'){
          return redirect('proje/'.$id);
     }
       $projects = Projects::where('id',$id)->where('marka_id',$user->brand_id)->get();
      
       $status = Status::all();
    return view('pages.today-leads')->with(compact('leads','status','projects','project','today','filter'));
  }

  public function change(Request $request,$id){
    $lead = Leads::find($id);
       
        
          $input = $request->all();

          $lead->update($input);

          return redirect()->back();
  }

	public function deleteLead($id){
		  $leads = Leads::find($id);      
          $leads->delete();



        return back();
	}


	public function logout(){
		Auth::logout();
		return redirect('/');
	}

}