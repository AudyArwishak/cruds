@extends('template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row">
    <div class="col-12">
      <div class="tile_count">
        <div class="col-md-3 col-sm-3 tile_stats_count">
          <span class="count_top"><i class="fa fa-users"></i> Jumlah Supir</span>
          <div class="count green">{{ $supir }}</div>
        </div>
        <div class="col-md-3 col-sm-3  tile_stats_count">
          <span class="count_top"><i class="fa fa-truck"></i> Jumlah Truk</span>
          <div class="count blue">{{ $truk }}</div>
        </div>
        <div class="col-md-3 col-sm-3  tile_stats_count">
          <span class="count_top"><i class="fa fa-home"></i> Jumlah Gudang</span>
          <div class="count yellow">{{ $gudang }}</div>
        </div>
        <div class="col-md-3 col-sm-3  tile_stats_count">
          <span class="count_top"><i class="fa fa-ship"></i> Jumlah Outlet</span>
          <div class="count red">{{ $outlet }}</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /top tiles -->
</div>
<!-- /page content -->

@endsection