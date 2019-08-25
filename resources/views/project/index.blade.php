@include('includes/header_start')

<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('')}}vendor/select2/css/select2.css" />
<link rel="stylesheet" href="{{asset('')}}vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
<link rel="stylesheet" href="{{asset('')}}vendor/datatables/media/css/dataTables.bootstrap4.css" />

@include('includes/header_end')

<!-- ==================
     PAGE CONTENT START
     ================== -->

<div class="page-content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="card m-b-20">
                    <div class="card-body m-t-15 project_body">
                        @include('includes/partials/alerts')
                        <div class="row" style="margin: 0">
                            <div class="col-md-6">
                                <h3 class="mt-0 font-18 ml-md-1 mb-md-4">My Projects</h3>
                            </div>
                            <div class="col-md-6" style="text-align: right">
                                <a class="btn btn-primary project-add-btn" href="{{route('project.addView')}}">New</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 10%;">No</th>
                                        <th style="width: 75%;">Name</th>
                                        <th style="width: 15%;">Created_at</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

@include('includes/footer_start')

<!-- Specific Page Vendor -->
<script src="{{asset('')}}vendor/select2/js/select2.js"></script>
<script src="{{asset('')}}vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/JSZip-2.5.0//jszip.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>


<!-- Examples -->
<script src="{{asset('')}}js/examples/examples.datatables.default.js"></script>
<script src="{{asset('')}}js/examples/examples.datatables.row.with.details.js"></script>
<script src="{{asset('')}}js/examples/examples.datatables.tabletools.js"></script>
<script>


    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('ajax.project.index') }}',
        "order": [[ 0, "desc" ]],
        "pageLength": 25,
        columns: [
            { data: 'index', name: 'index' },
            { data: 'image', render:function (data, type, row) {
                    var image = "<image src='{{url('uploads/project')}}/"+data+"' alt='150x150' class='img-thumbnail' style='width: 100px; height: 100px;'/>";
                    return image;
                } },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' }
        ]
    });

    $('#datatable tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        var url = '{{url('detail/index')}}/' + data['id'];

        window.location.href = url;
    } );


</script>
@include('includes/footer_end')