@extends('template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Admin</h3>
            </div>


            <div class="title_right">
                <div class="form-group pull-right top_search">
                    <a href="{{ route('admin.create') }}">
                        <button class="btn btn-primary"> <i class="fa fa-plus"></i></button>
                    </a>
                    <a href="{{ url('print-admin') }}" target='_blank' <button class="btn btn-primary"> <i class="fa fa-clipboard"></i></button>
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
                                        Nama Admin
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email
                                    </th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Password
                                    </th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Level Akses
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($admin as $pgw)
                                <?php $no++ ?>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama_admin }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->email }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->kata_sandi }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->level_akses }}</p>
                                </td>
                                <td>
                                    <form action="{{ route('admin.destroy', $pgw->id_admin) }}" method="POST">
                                        <a href="{{ route('admin.edit', $pgw->id_admin) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
                {!! $admin->links() !!}
            </div>
        </div>
    </div>
    <!-- /page content -->
    @endsection