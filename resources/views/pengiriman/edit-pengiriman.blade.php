@extends('template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Data Pengiriman</h3>
            </div>

            {{-- <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div> --}}
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" action="{{ route('pengiriman.update', ['id' => $pengiriman->id_pengiriman]) }}" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                            @csrf
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nama Truk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="id_truk" id="id_truk" required>
                                        @foreach ($truk as $hot)
                                        <option value="{{ $hot->id_truk }}">
                                            {{ $hot->nama_truk }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nama Supir</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="id_supir" id="id_supir" required>
                                        @foreach ($supir as $hot)
                                        <option value="{{ $hot->id_supir }}">
                                            {{ $hot->nama_supir }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jenis Gula</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="id_gula" id="id_gula" required>
                                        @foreach ($gula as $hot)
                                        <option value="{{ $hot->id_gula }}">
                                            {{ $hot->nama_gula }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nama Outlet Tujuan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="id_outlet" id="id_outlet" required>
                                        @foreach ($outlet as $hot)
                                        <option value="{{ $hot->id_outlet }}">
                                            {{ $hot->nama_outlet }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" name="jumlah_kg" class="form-control" type="text" name="middle-name" class="form-control" value="{{$pengiriman->jumlah_kg}}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    {{-- <button class="btn btn-primary" type="button">Cancel</button> --}}
                                    {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection