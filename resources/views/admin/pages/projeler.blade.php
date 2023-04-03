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

<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="data-table-list">
                        
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                              
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Proje Adı</th>                                       
                                        <th>Marka</th>                                       
                                        <th>İşlem</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->name }}</td>                                    
                                        <td>{{ $project->brands['name'] }}</td>                                    
                                        <td><button class="btn btn-success waves-effect" type="button" onclick="location.href='{{ url('/admin/proje-duzenle/'.$project->id) }}'">
                                                    <i class="material-icons">Düzenle</i>
                                                </button> /  <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{ $project->id }})">
                                                    <i class="material-icons">Sil</i>
                                                </button>
                                                <form id="delete-form-{{ $project->id }}" action="{{ url('admin/delete-project',$project->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
</form>
                                        </td>                                    
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
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
                 
                    document.getElementById('delete-form-'+id).submit();
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

@endsection
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