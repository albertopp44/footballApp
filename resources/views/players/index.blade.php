@extends('app')



    @section('content')
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>League Logo</th>
                    <th>Name</th>
                    <th>Team name</th>
                    <th>Team Logo</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    @endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('playersAjax') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        "render": function(data, type, row) {
                            return "<img src='" + data + "' width=75 height=75>";
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'games_played',
                        name: 'games_played',
                        orderable:true
                    },
                    {
                        data: 'goals_scored',
                        name: 'goals_scored',
                        orderable:true
                    },
                    
                    {
                        data: 'team_name',
                        name: 'team_name'
                    },
                    {
                        data: 'team_image',
                        name: 'team_image',
                        "render": function(data, type, row) {
                            return "<img src='" + data + "' width=75 height=75>";
                        }
                    },
                ]
            });

        });
    </script>


