@extends('layouts.master')

@section('title')
    <title>Dashboard | SIMPOS PBB</title>
@endsection

@section('content')
    <!-- Page -->
    <div class="page-content container-fluid">
        <div class="row" data-plugin="" data-by-row="true">
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea One-->
                <div class="card card-shadow" id="widgetLineareaOne">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-account grey-600 font-size-24 vertical-align-bottom mr-5"></i> Wajib Pajak
                            </div>
                            <span class="float-right grey-700 font-size-30">1,253</span>
                        </div>
                        <div class="mb-20 grey-500">
                            <i class="icon md-long-arrow-up green-500 font-size-16"></i> 15%
                            Dari Bulan Lalu
                        </div>
                        <div class="ct-chart h-50"></div>
                    </div>
                </div>
                <!-- End Widget Linearea One -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea Two -->
                <div class="card card-shadow" id="widgetLineareaTwo">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i> NOP
                            </div>
                            <span class="float-right grey-700 font-size-30">2,425</span>
                        </div>
                        <div class="mb-20 grey-500">
                            <i class="icon md-long-arrow-up green-500 font-size-16"></i> 34.2%
                            Dari Bulan Lalu
                        </div>
                        <div class="ct-chart h-50"></div>
                    </div>
                </div>
                <!-- End Widget Linearea Two -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea Three -->
                <div class="card card-shadow" id="widgetLineareaThree">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom mr-5"></i> Transaksi
                            </div>
                            <span class="float-right grey-700 font-size-30">1,864</span>
                        </div>
                        <div class="mb-20 grey-500">
                            <i class="icon md-long-arrow-down red-500 font-size-16"></i> 15%
                            Dari Bulan Lalu
                        </div>
                        <div class="ct-chart h-50"></div>
                    </div>
                </div>
                <!-- End Widget Linearea Three -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea Four -->
                <div class="card card-shadow" id="widgetLineareaFour">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom mr-5"></i> Lunas
                            </div>
                            <span class="float-right grey-700 font-size-30">845</span>
                        </div>
                        <div class="mb-20 grey-500">
                            <i class="icon md-long-arrow-up green-500 font-size-16"></i> 18.4%
                            Dari Bulan Lalu
                        </div>
                        <div class="ct-chart h-50"></div>
                    </div>
                </div>
                <!-- End Widget Linearea Four -->
            </div>
            <div class="col-xxl-5 col-lg-6">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title">Rekapitulasi Penerimaan</h3>
                    </div>
                    <div class="panel-chart-home">
                        <div id="exampleC3Combination"></div>
                    </div>
                </div>
                <!-- End Panel Projects -->
            </div>
            <div class="col-xxl-5 col-lg-6">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title">Penerimaan Perkecamatan</h3>
                    </div>
                    <div class="panel-chart-home">
                        <div id="exampleC3StackedBar"></div>
                    </div>
                </div>
                <!-- End Panel Projects -->
            </div>
            <div class="col-xxl-5 col-lg-6">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tabel Rekapitulasi Penerimaan</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td width="1%">No</td>
                                    <td>Wilayah</td>
                                    <td>Ketetapan</td>
                                    <td>Realisasi</td>
                                    <td>(%)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>GANTARANG</td>
                                    <td>2,161,027,974</td>
                                    <td>608,889,685</td>
                                    <td><span class="badge badge-danger">28.18</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>UJUNG BULU</td>
                                    <td>1,775,541,625</td>
                                    <td>643,568,529</td>
                                    <td><span class="badge badge-danger">36.25</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>BONTO BAHARI</td>
                                    <td>456,182,928</td>
                                    <td>236,905,150</td>
                                    <td><span class="badge badge-success">51.93</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>BONTO TIRO</td>
                                    <td>611,953,456</td>
                                    <td>194,828,494</td>
                                    <td><span class="badge badge-danger">31.84</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>HERLANG</td>
                                    <td>857,069,740</td>
                                    <td>206,017,194</td>
                                    <td><span class="badge badge-danger">24.04</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Panel Projects -->
            </div>
            <div class="col-xxl-5 col-lg-6">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title">Penerimaan Perbulan</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td width="1%">No</td>
                                    <td>Periode / Bulan</td>
                                    <td>Jumlah</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Januari</td>
                                    <td>161,027,974</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>1,027,974</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>2,027,974</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>April</td>
                                    <td>3,027,974</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Mei</td>
                                    <td>6,027,974</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Panel Projects -->
            </div>
        </div>
    </div>
    <!-- End Page -->
@endsection