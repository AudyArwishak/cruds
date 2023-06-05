@extends('template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Truk</h3>
            </div>


            <div class="title_right">
                <div class="form-group pull-right top_search">
                    <a href="{{ route('truk.create') }}">
                        <button class="btn btn-primary"> <i class="fa fa-plus"></i></button>
                    </a>
                    <a href="{{ url('print-truk') }}" target='_blank' <button class="btn btn-primary"> <i class="fa fa-clipboard"></i></button>
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
                                        ID Truk
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Truk
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Kapasitas Truk
                                    </th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Plat Nomor
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($truk as $pgw)
                                <?php $no++; ?>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->id_truk }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama_truk }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->kapasitas_truk }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->plat_nomor }}</p>
                                </td>
                                <td>
                                    <form action="{{ route('truk.destroy', $pgw->id_truk) }}" method="POST">
                                        <a href="{{ route('truk.edit', $pgw->id_truk) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
                {!! $truk->links() !!}
            </div>
        </div>
    </div>
    <!-- /page content -->
    @endsection