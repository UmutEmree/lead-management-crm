@extends('admin')

@section('css')

<!-- bootstrap select CSS ============================================ -->
<link rel="stylesheet" href="{{ asset('public/css/bootstrap-select/bootstrap-select.css') }}">
<!-- datapicker CSS ============================================ -->
<link rel="stylesheet" href="{{ asset('public/css/datapicker/datepicker3.css') }}">

@endsection

@section('content')

<div class="form-example-area">
        <div class="container">
            
          
            
            <div class="row" style="margin-right:-75px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2></h2>
                        </div>
                         <form action="{{ route('admin.proje-duzenlePost',$project->id) }}" method="post">
                            {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Proje Adı</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="name" value="{{ $project->name }}" class="form-control input-sm" required placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Marka</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                           <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" name="marka_id" data-live-search="true" required="">
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $project->marka_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                    </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Gönderilecek Mail Adresi</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="mail_adresi" value="{{ $project->mail_adresi }}" class="form-control input-sm" required placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Gönderilecek Mail Adresi 2</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="mail_adresi2" value="{{ $project->mail_adresi2 }}" class="form-control input-sm" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Gönderilecek Mail Adresi 3</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="mail_adresi3" value="{{ $project->mail_adresi3 }}" class="form-control input-sm" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Gönderilecek Mail Adresi 4</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="mail_adresi4" value="{{ $project->mail_adresi4 }}" class="form-control input-sm" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Gönderilecek Mail Adresi 5</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="mail_adresi5" value="{{ $project->mail_adresi5 }}" class="form-control input-sm" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mail Başlığı</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="mail_baslik" value="{{ $project->mail_baslik }}" class="form-control input-sm" required placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Teşekkür Sayfası</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="tesekkur_sayfasi" value="{{ $project->tesekkur_sayfasi }}" required class="form-control input-sm" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success">Güncelle</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2></h2>
                        </div>
                        
                        <div class="form-example-int form-horizental">
                            <h1>Alttaki Çıktıyı Referans Alınız.</h1>
                         <code>
                            &lt;form action="{{ url('add-lead') }}" class="contact_form"  method="post"&gt; <br>
                                 &lt;input type="hidden" name="project_id" value="{{ $project->id }}"&gt; <br>
                                 &lt;input type="text" placeholder="Adınız Soyadınız" name="name" id="name" /&gt; <br>
                                 &lt;input type="tel"  placeholder="Telefon Numaranız" name="phone" id="phone"/&gt; <br>
                                 &lt;input type="email" placeholder="E-posta Adresiniz" name="email" required /&gt; <br>
                                 &lt;textarea name="message" rows="4"></textarea> <br>
                                 &lt;input name="duyurukayit" type="checkbox" value="Evet" checked/&gt; <br>
                                 &lt;label for="duyurukayit">{{ $project->brands['name'] }} kampanyalarından telefon, sms ve mail yoluyla haberdar olmak istiyorum. </label> <br>
                                  &lt;input  class="form-submit" type="submit" value="GÖNDER" name="submit" /&gt; <br>
                              &lt;/form&gt;
                           </code>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection               

@section('js')

<!-- Input Mask JS============================================ -->
    <script src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<!-- datapicker JS============================================ -->
    <script src="{{ asset('public/js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('public/js/datapicker/datepicker-active.js') }}"></script>
<!-- bootstrap select JS============================================ -->
    <script src="{{ asset('public/js/bootstrap-select/bootstrap-select.js') }}"></script>

@endsection 