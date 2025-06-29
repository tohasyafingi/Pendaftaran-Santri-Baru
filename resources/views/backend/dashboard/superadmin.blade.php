@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <p class="mb-0">{{ auth()->user()->name }}</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">PPUQ</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-user text-success border-success"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Jumlah Santri</div>
                        <div class="stat-digit">1,012</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-user text-primary border-primary"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Jumlah Santri Baru</div>
                        <div class="stat-digit">961</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-layout-grid2 text-pink border-pink"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Projects</div>
                        <div class="stat-digit">770</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-link text-danger border-danger"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Referral</div>
                        <div class="stat-digit">2,781</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Fee Collections and Expenses</h4>
                </div>
                <div class="card-body">
                    <div class="ct-bar-chart mt-5"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="ct-pie-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Exam Result</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Grade Point</th>
                                    <th>Percent Form</th>
                                    <th>Percent Upto</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Class Test</td>
                                    <td>Mathmatics</td>
                                    <td>
                                        4.00
                                    </td>
                                    <td>
                                        95.00
                                    </td>
                                    <td>
                                        100
                                    </td>
                                    <td>20/04/2017</td>
                                </tr>
                                <tr>
                                    <td>Class Test</td>
                                    <td>Mathmatics</td>
                                    <td>
                                        4.00
                                    </td>
                                    <td>
                                        95.00
                                    </td>
                                    <td>
                                        100
                                    </td>
                                    <td>20/04/2017</td>
                                </tr>
                                <tr>
                                    <td>Class Test</td>
                                    <td>English</td>
                                    <td>
                                        4.00
                                    </td>
                                    <td>
                                        95.00
                                    </td>
                                    <td>
                                        100
                                    </td>
                                    <td>20/04/2017</td>
                                </tr>
                                <tr>
                                    <td>Class Test</td>
                                    <td>Bangla</td>
                                    <td>
                                        4.00
                                    </td>
                                    <td>
                                        95.00
                                    </td>
                                    <td>
                                        100
                                    </td>
                                    <td>20/04/2017</td>
                                </tr>
                                <tr>
                                    <td>Class Test</td>
                                    <td>Mathmatics</td>
                                    <td>
                                        4.00
                                    </td>
                                    <td>
                                        95.00
                                    </td>
                                    <td>
                                        100
                                    </td>
                                    <td>20/04/2017</td>
                                </tr>
                                <tr>
                                    <td>Class Test</td>
                                    <td>English</td>
                                    <td>
                                        4.00
                                    </td>
                                    <td>
                                        95.00
                                    </td>
                                    <td>
                                        100
                                    </td>
                                    <td>20/04/2017</td>
                                </tr>
                                <tr>
                                    <td>Class Test</td>
                                    <td>Mathmatics</td>
                                    <td>
                                        4.00
                                    </td>
                                    <td>
                                        95.00
                                    </td>
                                    <td>
                                        100
                                    </td>
                                    <td>20/04/2017</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection