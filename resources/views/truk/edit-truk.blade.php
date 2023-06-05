@extends('template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Data Truk</h3>
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
                        <form id="demo-form2" action="{{ route('truk.update', $truk->id_truk) }}" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Truk
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="nama_truk" id="last-name" name="last-name" required="required" class="form-control" value="{{$truk->nama_truk}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kapasitas Truk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" name="kapasitas_truk" class="form-control" type="text" name="middle-name" value="{{$truk->kapasitas_truk}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Plat Nomor
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" name="plat_nomor" class="form-control" type="text" name="middle-name" value="{{$truk->plat_nomor}}">
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