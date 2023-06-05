@extends('template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Outlet</h3>
            </div>


            <div class="title_right">
                <div class="form-group pull-right top_search">
                    <a href="{{ route('outlet.create') }}">
                        <button class="btn btn-primary"> <i class="fa fa-plus"></i></button>
                    </a>
                    <a href="{{ url('print-outlet') }}" target='_blank' <button class="btn btn-primary"> <i class="fa fa-clipboard"></i></button>
                    </a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        NO
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        ID Outlet
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Outlet
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Alamat
                                    </th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Notelp
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($outlet as $pgw)
                                <?php $no++; ?>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->id_outlet }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama_outlet }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->alamat_outlet }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->notelp }}</p>
                                </td>
                                <td>
                                    <form action="{{ route('outlet.destroy', $pgw->id_outlet) }}" method="POST">
                                        <a href="{{ route('outlet.edit', $pgw->id_outlet) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            <button class="btn btn-info" type="button">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </tbody>
                    </div>
                </div>
                {!! $outlet->links() !!}
            </div>
        </div>
    </div>
    <!-- /page content -->
    @endsection