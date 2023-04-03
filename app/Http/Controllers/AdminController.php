<?php

namespace App\Http\Controllers;
use App\Projects;
use App\Brands;
use App\Leads;
use App\Status;
use App\User;
use App\Sectors;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
class AdminController extends Controller
{
	   public function __construct()
    {
        $this->middleware('admin.user');
    }
	public function index(){
	   
	   $today = Carbon::today();
	   $projects = Projects::with('brands')->orderbyDesc('id')->paginate(20);
	   $totalP = Projects::all();
	   $month = date('m');
	   $users = User::count();
	   $brands = Brands::count();
	
	     foreach($totalP as $p){
          $a[] = $p->leads->count();
          $total = array_sum($a);
           
     	 }
   			 return view('admin.home')->with(compact('projects','total','brands','users','today','month','totalP'));
	}

	public function search(Request $request){
		 if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('projects')
        ->where('name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
	}

	public function searchDo(Request $request){
		 $today = Carbon::today();
	   $totalP = Projects::all();
	   $month = date('m');
	   $users = User::count();
	   $brands = Brands::count();
	
	     foreach($totalP as $p){
          $a[] = $p->leads->count();
          $total = array_sum($a);
           
     	 }

		$term = $request->name;
		$project = Projects::where('name','LIKE','%'.$term.'%')->get();
		if(count($project) == 0){
			$projects[] = 'Proje Bulunamadı...';
		}else {
			foreach($project as $key => $value){
				$projects[] = $value;
			}
		}

		return view('admin.pages.results')->with(compact('projects','total','brands','users','today','month','totalP'));
	}

	public function leads($id){
    	
    	 $project = Projects::where('id',$id)->first();
    	
    	 if (empty($project)){	return back();    	 }

    	 $projects = Projects::where('id',$id)->get();
    	
    	 $status = Status::all();
    	 $filter = 'Seçiniz';
    	 $status = Status::all();
		return view('admin.pages.leads')->with(compact('leads','status','projects','project','filter'));
	}

	public function deleteLead($id){
		  $leads = Leads::find($id);      
          $leads->delete();
          
          return back();
          
	}
	public function deleteBrand($id){
		 $brands = Brands::find($id);      
          $brands->delete();
          
          return back();

	}
	public function deleteProject($id){
		 $project = Projects::find($id);      
          $project->delete();
          
          return back();

	}

	public function deleteUser($id){
		 $user = User::find($id);      
          $user->delete();
          
          return back();

	}

	public function markaolustur(){
		$sectors = Sectors::all();
		return view('admin.pages.marka-olustur')->with(compact('sectors'));
	}
	public function markaduzenle($id){
		$brand = Brands::find($id);
		$sectors = Sectors::all();
		return view('admin.pages.marka-duzenle')->with(compact('brand','sectors'));
	}

	public function markaolusturPost(Request $request){
		  Brands::create($request->all());
	    return redirect('admin/markalar');

	}
	 public function markaduzenlePost(Request $request, $id)
    {
        $brand = Brands::find($id);
          $input = $request->all();
          $brand->update($input);

          return redirect()->back();
    }

	public function projeolustur(){
		$brands = Brands::all();
		return view('admin.pages.proje-olustur')->with(compact('brands'));
	}

	public function projeolusturPost(Request $request){

		 $project =  Projects::create($request->all());
	     return redirect()->route('project.duzenle', $project->id);
	}

	public function projeduzenle($id){
		$project = Projects::find($id);
		$brands = Brands::all();
		return view('admin.pages.proje-duzenle')->with(compact('brands','project'));
	}

	  public function projeduzenlePost(Request $request, $id)
    {
        $project = Projects::find($id);
       
        
          $input = $request->all();

          $project->update($input);

          return redirect()->back();
    }

	public function kullaniciolustur(){
		$brands = Brands::all();
		return view('admin.pages.kullanici-olustur')->with(compact('brands'));
	}
	
	public function kullaniciduzenle($id){
		$user = User::find($id);
		$brands = Brands::all();
		return view('admin.pages.kullanici-duzenle')->with(compact('user','brands'));
	}

	public function kullaniciduzenlePost(Request $request, $id){

        $user = User::find($id);
      
        if(Input::has('password')){
        $password = bcrypt($request->password);
        $user->update(array(
            'password' => $password,
            ));
     	 }
        $input = Input::except('_method', '_token','password');
        

          $user->update($input);

          return redirect()->back();
	}
	public function kullaniciolusturPost(Request $request){
		   $this->validate($request,[

            'name' => 'required:min3',
           
            ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->brand_id = $request->brand_id;
        
        $user->save();

        return redirect()->route('admin.kullanicilar');
	}

	public function markalar(){
		$brands = Brands::all();
		return view('admin.pages.markalar')->with(compact('brands'));
	}

	public function projeler(){
		$projects = Projects::all();
		return view('admin.pages.projeler')->with(compact('projects'));
	}

	public function kullanicilar(){
		$users = User::all();
		return view('admin.pages.kullanicilar')->with(compact('users'));
	}

	public function logout(){
		Auth::guard('admin')->logout();
		return redirect('admin/login');
	}


     public function leadsFilter(Request $request,$id){
     $today = Carbon::today();
     $filter = $request->status;
     if($filter == 'tumu'){
          return redirect('admin/proje/'.$id);
     }


     
       $project = Projects::where('id',$id)->first();
       if (empty($project)){
        return back();       }
       $projects = Projects::where('id',$id)->get();
       $status = Status::all();
    return view('admin.pages.filter-leads')->with(compact('leads','status','projects','project','today','filter'));
   }

     public function dateFilter(Request $request,$id){
     $today = Carbon::today();
     $filter = $request->status;
     if($filter == 'tumu'){
          return redirect('admin/proje/'.$id);
     }
     $baslangic = $request->baslangic;
     $bitis     = $request->bitis;

      $user = Auth::user();
       $project = Projects::where('id',$id)->first();
       if (empty($project)){
        return back();       }
       $projects = Projects::where('id',$id)->get();
      

       $status = Status::all();
    return view('admin.pages.filter-date')->with(compact('leads','status','projects','project','today','filter','baslangic','bitis','lead'));
   }
   
   public function leadsToday(Request $request,$id){
     $today = Carbon::today();
     
       $project = Projects::where('id',$id)->first();
       if (empty($project)){
        return back();       }
         $filter = $request->status;
     if($filter == 'tumu'){
          return redirect('admin/proje/'.$id);
     }
       $projects = Projects::where('id',$id)->get();
      
       $status = Status::all();
    return view('admin.pages.today-leads')->with(compact('leads','status','projects','project','today','filter'));
  }

  public function change(Request $request,$id){
    $lead = Leads::find($id);
       
        
          $input = $request->all();

          $lead->update($input);

          return redirect()->back();
  }
}
