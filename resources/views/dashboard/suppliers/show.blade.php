@extends('layouts.shared')

@section('content')

    <div id="content2">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="row mb-12">
                    <div class="col-12 col-md-12">
                        <div class="card redial-border-light redial-shadow mb-12">
                            <div class="card-body">

                                <a href="{{url('dashboard/supplier/add')}}" class='btn btn-info' style="float: right">
                                    add supplier
                                </a>

                                <div style="clear: both">

                                </div>

                                <h6 class="header-title pl-3 redial-relative">Suppliers</h6>
                                <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Edit info</th>
                                        <th>Edit payment</th>
                                        <th>Edit Products</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td>{{$supplier->name}}</td>
                                            <td>{{$supplier->email}}</td>
                                            <td>{{$supplier->phone}}</td>
                                            <td><a href="{{url('dashboard/supplier/edit_info/'.$supplier->id)}}"
                                                   class='btn btn-info'><i style="color:#fff"
                                                                           class="fa fa-pencil-square-o"
                                                                           aria-hidden="true"></i></a></td>
                                            <td><a href="{{url('dashboard/supplier/edit_payment/'.$supplier->id)}}"
                                                   class='btn btn-info'><i style="color:#fff"
                                                                           class="fa fa-pencil-square-o"
                                                                           aria-hidden="true"></i></a></td>
                                            <td><a href="{{url('dashboard/supplier/edit_products/'.$supplier->id)}}"
                                                   class='btn btn-info'><i style="color:#fff"
                                                                           class="fa fa-pencil-square-o"
                                                                           aria-hidden="true"></i></a></td>
                                            <td>
                                                <button data-id="{{$supplier->id}}" type="button"
                                                        class="btn btn-danger delete-item"><i class="fa fa-trash"></i>
                                                </button>
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
    </div>


@endsection

@section('extra')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete-item', function () {
                var id = $(this).attr("data-id");
                var _token = "{{ csrf_token() }}";

                var data = {
                    id: id,
                    _token: _token,
                    _method: 'delete'
                };
                $.ajax({
                    url: "{{url('dashboard/supplier')}}/" + id,
                    data: data,
                    type: 'POST',
                    success: function (response) {
                        if (response.status == 'success') {
                            window.location.href = "{{url('dashboard/supplier/all')}}";
                            swal("delete Successfully", "", "success");
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>

    @if(Session::has('success_message'))
        <script>
            swal("{{ Session::get('success_message') }}", "", "success");
        </script>
    @endif

@endsection