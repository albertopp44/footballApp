@extends('app')



    @section('content')
        <input type="hidden" name="teamId" value="{{ $data }}">
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Games played</th>
                    <th>Scored goals</th>
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
            let data = $('input[name="teamId"]').val();
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ env('APP_URL') }}/teamAjax/" + data + "",
                columns: [{

                        data: 'image',
                        name: 'image',
                        "render": function(data, type, row) {
                            let img = "";
                            /*if(!data)
                            {
                                img = "<img src='/footballapp/public/img/profile.webp' width=75 height=75>";
                            } else {
                                img = "<img src='" + data + "' width=75 height=75>";
                            }*/
                            return "<img src='/footballapp/public/img/profile.webp' width=75 height=75>";
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'age',
                        name: 'age'
                    },
                    {
                        data: 'games_played',
                        name: 'games_played',
                        orderable: true
                    },
                    {
                        data: 'goals_scored',
                        name: 'goals_scored',
                         orderable: true
                    }
                ]
            });

        });
      
    </script>
