<div class="breadcomb-area">
        
             <div class="row" style="margin-right: 30px;margin-left: 30px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>{{ $project->name }} </h2>
                                       
                                        <p>Projesine Ait <span class="bread-ntd"> {{ $project->leads->count() }} Lead Bulunmuştur</span></p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                                </div>
                            </div>
                              <div class="col-lg-12 col-md-12 mg-t-30">
                                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <button class="btn btn-primary notika-btn-primary" onclick="location.href='{{ url('/proje/'.$project->id.'/bugun') }}'">Bugün</button>
                            <button class="btn btn-warning notika-btn-warning" onclick="location.href='{{ url('/proje/'.$project->id) }}'">Tümü</button>
                            <button class="btn btn-success notika-btn-success">Excelle Aktar</button>
                            </div>    
                              </div>
                            <div class="col-lg-12 col-md-12 mg-t-30">
                            
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <h2>Filtrele</h2>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <form method="POST" action="{{ route('status-filter',$project->id) }}">
                                        {{ csrf_field() }}
                                    <select onchange="this.form.submit()" name="status" class="selectpicker">
                                            <option value="tumu">Tümü</option>
                                            <option value="Aranacak" @if($filter =='Aranacak') selected @endif>Aranacak</option>
                                            <option value="Arandı" @if($filter =='Arandı') selected @endif>Arandı</option>
                                            <option value="Tekrar Aranacak" @if($filter =='Tekrar Aranacak') selected @endif>Tekrar Aranacak</option>
                                            <option value="Mail Gönderildi" @if($filter =='Mail Gönderildi') selected @endif>Mail Gönderildi</option>
                                            <option value="Ulaşılamadı" @if($filter =='Ulaşılamadı') selected @endif>Ulaşılamadı</option>
                                            <option value="Hatalı/Eksik Numara" @if($filter =='Hatalı/Eksik Numara') selected @endif>Hatalı/Eksik Numara</option>
                                        </select>
                                        </form>
                                </div>
                            </div>    
                             <form method="POST" action="{{ route('date-filter',$project->id) }}">
                                        {{ csrf_field() }}
                              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                    <label>Başlangıç Tarihi</label>
                                    <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" value="" name="baslangic">
                                    </div>
                                     
                                </div>
                            </div>       
                             <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                    <label>Bitiş Tarihi</label>
                                    <div class="input-group date nk-int-st" >
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" value="" name="bitis">

                                    </div>
                                     
                                </div>
                            </div> 
                              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                <div class="form-group nk-datapk-ctm form-elet-mg" >
                                    <label style="margin-bottom: 5px"></label>
                                    <div class="input-group nk-int-st">
                                          <button class="btn btn-info info-icon-notika waves-effect"><i class="notika-icon notika-search"></i></button> 

                                    </div>
                                     
                                </div>
                            </div> 
                                </form>                                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>