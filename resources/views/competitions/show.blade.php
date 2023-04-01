@extends('app')


    @section('content')
        <input type="hidden" name="competitionId" value="{{ $data }}">
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>League Logo</th>
                    <th>Players total games(Click me to change order)</th>
                    <th>Scored goals(Click me to change order)</th>
                    <th>Go to team</th>
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
            let data = $('input[name="competitionId"]').val();
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ env('APP_URL') }}/competitionAjax/" + data + "",
                columns: [{
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
                        data: 'players_games',
                        name: 'players_games',
                        orderable: true, 
                    },
                    {
                        data: 'players_goals',
                        name: 'players_goals',
                        orderable: true, 
                    },
                    {
                        data: 'id',
                        name: 'id',
                        "render": function(data, type, row) {


                            return '<a href="{{ env('APP_URL') }}/teams/' + data + '">Show';
                        }
                    },
                ]
            });

        });
      
    </script>


