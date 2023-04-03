@extends('admin')


@section('css')
 
<link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.min.css') }}">
<!-- bootstrap select CSS ============================================ -->
<link rel="stylesheet" href="{{ asset('public/css/bootstrap-select/bootstrap-select.css') }}">
<!-- datapicker CSS ============================================ -->
<link rel="stylesheet" href="{{ asset('public/css/datapicker/datepicker3.css') }}">

<style type="text/css">
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn){width:150px}
</style>

@endsection

@section('content')

@include('partials.lead-top')
	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
            <div class="row" style="margin-right: 30px;margin-left: 30px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tarih</th>
                                        <th>Saat</th>
                                        <th>Ad Soyad</th>
                                        <th>Telefon</th>
                                        <th>E-mail</th>
                                        <th>Mesaj</th>
                                        <th>Not</th>
                                        <th>Durum</th>
                                        <th>Utm Source</th>
                                        <th>Utm Medium</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                               @foreach($projects as $projectx)
                               @foreach($projectx->leads as $lead)
                                    <tr style="
                                    @if($lead->status == 'Arandı')
                                    background:rgba(81, 203, 125, 0.23);
                                    @endif 
                                    @if($lead->status == 'Ulaşılamadı')
                                    background:#f9000080;
                                    @endif
                                    @if($lead->status == 'Tekrar Aranacak') 
                                     background:#2c9cba99
                                    @endif
                                     @if($lead->status == 'Hatalı/Eksik Numara') 
                                     background:#0000004d
                                    @endif
                                    @if($lead->status == 'Mail Gönderildi') 
                                     background:#2159de4d
                                    @endif
                                    ">
                                        <td>{{ $lead->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $lead->created_at->format('H:i:s') }}</td>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->phone }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td><button class="btn notika-btn-indigo waves-effect" style="color:#fff" data-toggle="popover" data-placement="top" data-content="{{ $lead->message }}" title="" data-original-title="">Mesaj</button></td>
                                        <td><button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#Not" >Not <div class="accordion-area">
                                                

                                    </button>
                                        
                                    </div>
                                        </td>
                                        <td style="width:170px">
                                   <form action="{{ route('status-change',$lead->id) }}" method="POST">
                                     {{ csrf_field() }}
                                   {{ method_field('PUT') }}
                                    <select name="status" onchange="this.form.submit()" style="width:150px">      

                                             @foreach($status as $s)

                            <option value="{{ $s->name }}"  {{ $lead->status == $s->name ? 'selected' : '' }}>{{ $s->name }}</option>

                          @endforeach
                                        </select>
                                        </form>
                              </td>
                                        <td>{{ $lead->utm_source }}</td>
                                        <td>{{ $lead->utm_medium }}</td>
                                        <td><button onclick="deleteTag({{ $lead->id }})" class="btn btn-danger cyan-icon-notika waves-effect"><i class="notika-icon notika-close"></i></button></td>
        
                                                <form id="delete-lead-{{ $lead->id }}" action="{{ url('delete-lead',$lead->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>         
   
                             

                                    </tr>
                                @endforeach
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tarih</th>
                                        <th>Saat</th>
                                        <th>Ad Soyad</th>
                                        <th>Telefon</th>
                                        <th>E-mail</th>
                                        <th>Mesaj</th>
                                        <th>Not</th>
                                        <th>Durum</th>
                                        <th>Utm Source</th>
                                        <th>Utm Medium</th>
                                        <th>İşlem</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal animated bounce" id="Not" role="dialog">
        <div class="modal-dialog modals-default">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="accordion-stn">
                                    <div class="panel-group" data-collapse-color="nk-green" id="accordionGreen" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-one" aria-expanded="true">
                                                            Not 1
                                                        </a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry cry then richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf msr noontemporem, sunt aliqua put a bird on it squid single-origin coffee nullassumendan shoreditch et.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-two" aria-expanded="false">
                                                            Not 2
                                                        </a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry cry then richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf msr noontemporem, sunt aliqua put a bird on it squid single-origin coffee nullassumendan shoreditch et.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-three" aria-expanded="false">
                                                            Not 3
                                                        </a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-three" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry cry then richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf msr noontemporem, sunt aliqua put a bird on it squid single-origin coffee nullassumendan shoreditch et.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Not Ekle</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-3 col-xs-12">
                                <div class="form-example-int form-example-st">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Başlık">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-3 col-xs-12">
                                <div class="form-example-int form-example-st">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="İçerik">
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 mg-t-30">
                                <div class="form-example-int">
                                    <button class="btn btn-success notika-btn-success">Gönder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top:30px">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>  
    </div>


    @endsection
<script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Emin misiniz?',
                text: "Sildiğiniz data geri getirlemez!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil!',
                cancelButtonText: 'İptal Et!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                 
                    document.getElementById('delete-lead-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'İptal Edildi',
                        'Data Güvende :)',
                        'error'
                    )
                }
            })
        }
    </script>
    @section('js')

    <script src="{{ asset('public/js/data-table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/js/data-table/data-table-act.js') }}"></script>
    <!-- Input Mask JS============================================ -->
    <script src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<!-- datapicker JS============================================ -->
    <script src="{{ asset('public/js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('public/js/datapicker/datepicker-active.js') }}"></script>
<!-- bootstrap select JS============================================ -->
    <script src="{{ asset('public/js/bootstrap-select/bootstrap-select.js') }}"></script>

    @endsection