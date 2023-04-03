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
            
          
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2></h2>
                        </div>
                        <form action="{{ route('admin.marka-olusturPost') }}" method="post">
                            {{ csrf_field() }}
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Marka Adı</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="name" required class="form-control input-sm" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Sektör</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                           <div class="bootstrap-select fm-cmp-mg">
                                    <select name="sector" required class="selectpicker" data-live-search="true">
                                            @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Proje Limit</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="limit" value="0" class="form-control input-sm" placeholder="">
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
                                    <button type="submit" class="btn btn-success notika-btn-success">Oluştur</button>
                                </div>
                            </div>
                        </div>
                        </form>
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