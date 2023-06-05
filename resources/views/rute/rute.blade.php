@extends('template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Rute</h3>
            </div>


            <div class="title_right">
                <div class="form-group pull-right top_search">
                    <a href="{{ route('rute.create') }}">
                        <button class="btn btn-primary"> <i class="fa fa-plus"></i></button>
                    </a>
                    <a href="{{ url('print-rute') }}" target='_blank' <button class="btn btn-primary"> <i class="fa fa-clipboard"></i></button>
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
                                        ID Rute
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Rute
                                    </th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jarak Rute
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($rute as $pgw)
                                <?php $no++; ?>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->id_rute }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama_rute }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->jarak_rute }}</p>
                                </td>
                                <td>
                                    <form action="{{ route('rute.destroy', $pgw->id_rute) }}" method="POST">
                                        <a href="{{ route('rute.edit', $pgw->id_rute) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
                {!! $rute->links() !!}
            </div>
        </div>
    </div>
    <!-- /page content -->
    @endsection