<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Tổng quan</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Xuất kho</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{$tongXuat}}</h1>
                                    <div class="mb-0">
                                        <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i>
                                            @php
                                                if($tongX == 0) echo "0%";
                                                else{
                                                    $percent = ($tongXuat - $tongX)*100/$tongX;
                                                    echo number_format($percent,2)."%";
                                                }
                                            @endphp
                                        </span>
                                        <span class="text-muted">Từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Khách hàng</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">14.212</h1>
                                    <div class="mb-0">
                                        <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>
                                           10%
                                        </span>
                                        <span class="text-muted">Từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Nhập kho</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="inbox"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{$tongNhap}}</h1>
                                    <div class="mb-0">
                                        <span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i>
                                        @php
                                            if($tongN == 0) echo "0%";
                                            else{
                                                $percent = ($tongNhap - $tongN)*100/$tongN;
                                                echo number_format($percent,2)."%";
                                            }
                                        @endphp
                                        </span>
                                        <span class="text-muted">Từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Doanh thu</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        @php
                                            echo number_format($doanhThu);
                                        @endphp
                                        <span style="font-size: 16px;"><b>đ</b></span></h1>
                                    <div class="mb-0">
                                        <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>
                                            @php
                                                if($doanhThu == 0) echo "0%";
                                                else{
                                                    $percent = ($doanhThu - $dt)*100/$doanhThu;
                                                    echo number_format($percent,2)."%";
                                                }
                                            @endphp
                                        </span>
                                        <span class="text-muted">Từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thống kê</h5>
                    </div>
                    <div class="card-body pt-2 pb-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-3">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sử dụng trình duyệt</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="py-3">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-dashboard-pie"></canvas>
                                </div>
                            </div>

                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td><i class="fas fa-circle text-primary fa-fw"></i> Chrome <span
                                                class="badge badge-success-light">+12%</span></td>
                                        <td class="text-end">4306</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-circle text-warning fa-fw"></i> Firefox <span
                                                class="badge badge-danger-light">-3%</span></td>
                                        <td class="text-end">3801</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-circle text-danger fa-fw"></i> Edge</td>
                                        <td class="text-end">1689</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-circle text-dark fa-fw"></i> Other</td>
                                        <td class="text-end">3251</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Bản đồ</h5>
                    </div>
                    <div class="card-body px-4">
                        {{-- <div id="world_map" style="height:350px;"></div> --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d476861.257281873!2d105.37179279723776!3d20.97344498990772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1655002504421!5m2!1svi!2s" width="500" height="350" style="border:0;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-1">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Lịch</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg col-xxl d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sản phẩm mới nhất</h5>
                    </div>
                    <table class="table table-borderless my-0">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th class="d-none d-xxl-table-cell">Nhà cung cấp</th>
                                <th class="d-none d-xl-table-cell">Đơn giá</th>
                                <th class="d-none d-xl-table-cell">Số lượng tồn</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newProduct as $item)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="bg-light rounded-2">
                                                <img class="p-2" src="{{asset('storage/products/'.$item->image)}}" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <strong>{{$item->tenSP}}</strong>
                                        </div>
                                    </div>
                                </td>
                                <td class="d-none d-xxl-table-cell">
                                    <strong>{{$item->tenNCC}}</strong>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <strong>{{$item->giaNhap}}</strong>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <strong>{{$item->qty}}</strong>
                                </td>
                                <td>
                                    <div class="d-flex flex-column w-100">
                                        <span class="me-2 mb-1 text-muted">
                                            @php
                                                if($item->qty == 0){
                                                    $percent = 0;
                                                    echo number_format($percent, 2).'%';
                                                }
                                                else{
                                                    $percent = ($item->qty - $item->quantity)*100/$item->qty;
                                                    echo number_format($percent, 2).'%';
                                                }
                                            @endphp
                                        </span>
                                        <div class="progress progress-sm bg-danger-light w-100">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$percent}}%;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div>
            @php
                $i = 1;
            @endphp
            @foreach ($chart as $item)
                <input type="hidden" id="t{{$i++}}" value="{{$item->doanhThu}}">
            @endforeach
        </div>
    </div>
</main>

<script>
    
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
        gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
        var gradientDark = ctx.createLinearGradient(0, 0, 0, 225);
        gradientDark.addColorStop(0, "rgba(51, 66, 84, 1)");
        gradientDark.addColorStop(1, "rgba(51, 66, 84, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Tiền bán (đ)",
                    fill: true,
                    backgroundColor: window.theme.id === "light" ? gradientLight : gradientDark,
                    borderColor: window.theme.primary,
                    data: [
                        $('#t1').val(),
                        $('#t2').val(),
                        $('#t3').val(),
                        $('#t4').val(),
                        $('#t5').val(),
                        $('#t6').val(),
                        $('#t7').val(),
                        $('#t8').val(),
                        $('#t9').val(),
                        $('#t10').val(),
                        $('#t11').val(),
                        $('#t12').val()
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)",
                            fontColor: "#fff"
                        }
                    }]
                }
            }
        });
    });
</script>

@include('admin.js.mainjs')