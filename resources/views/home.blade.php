@extends('main')

@section('content')

<style type="text/css">
    .ust {margin-bottom: 20px}
</style>


    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"></div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">{{ $projects->count() }}</span></h2>
                            <p>Toplam Proje</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">
                            {{ $total }}
                            </span></h2>
                            <p>Toplam Lead</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"></div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row" style="padding-top: 30px">
          
            
               
             @foreach($projects as $project)
             <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 ust">
                    <div class="contact-list sm-res-mg-t-30">
                        
                        <div class="contact-ctn">
                            <div class="contact-ad-hd">
                                <h2>{{ str_limit($project->name,20) }}</h2>
                                <p class="ctn-ads">{{ $project->brands->name }}</p>                                
                            </div>                            
                        </div>
                        <div class="social-st-list">
                            <div class="social-sn">
                                <h2>Bugün</h2>
                                <p>956</p>
                            </div>
                            <div class="social-sn">
                                <h2>Bu Ay</h2>
                                <p>{{ $bugun }}</p>
                            </div>
                            <div class="social-sn">
                                <h2>Toplam</h2>
                                <p>{{ $project->leads->count() }}</p>
                            </div>

                        </div>
                        <button onclick="location.href='{{ url('/proje/'.$project->id) }}'" class="btn btn-primary notika-btn-primary mg-t-30">Bugün</button>                      
                        <button onclick="location.href='{{ url('/proje/'.$project->id) }}'" class="btn btn-success notika-btn-success mg-t-30">Toplam</button>
                    </div>
                    
                </div>                
                 @endforeach
           
                  
                    <div class="col-md-12" style="text-align: center">
                
                 </div>
            
            </div>
        </div>
    </div>
   
 
@endsection