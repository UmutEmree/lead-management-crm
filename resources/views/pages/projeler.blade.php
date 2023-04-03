@extends('main')

@section('content')

<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2>Projeler</h2>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Proje</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=1; $i < 11; $i++){ ?>
                                    <tr>
                                        <td>1</td>
                                        <td>Proje 1</td>                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection