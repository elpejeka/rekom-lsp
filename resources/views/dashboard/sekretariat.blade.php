@extends('layouts.v2.app')

@section('breadcumb')
<div class="container-fluid">        
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h4>{{$title}}</h4>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
            <li class="breadcrumb-item"></li>
          </ol>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="card course-box"> 
              <div class="card-body"> 
                <div class="course-widget"> 
                  <div class="course-icon"> 
                    <svg class="fill-icon">
                      <use href="../assets/svg/icon-sprite.svg#course-1"></use>
                    </svg>
                  </div>
                  <div> 
                    <h4 class="mb-0">100+</h4><span class="f-light">Permohonan Masuk</span>
                  </div>
                </div>
              </div>
              <ul class="square-group">
                <li class="square-1 warning"></li>
                <li class="square-1 primary"></li>
                <li class="square-2 warning1"></li>
                <li class="square-3 danger"></li>
                <li class="square-4 light"></li>
                <li class="square-5 warning"></li>
                <li class="square-6 success"></li>
                <li class="square-7 success"></li>
              </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card course-box"> 
              <div class="card-body"> 
                <div class="course-widget"> 
                  <div class="course-icon"> 
                    <svg class="fill-icon">
                      <use href="../assets/svg/icon-sprite.svg#course-1"></use>
                    </svg>
                  </div>
                  <div> 
                    <h4 class="mb-0">100+</h4><span class="f-light">Kelengkapan Dokumen</span>
                  </div>
                </div>
              </div>
              <ul class="square-group">
                <li class="square-1 warning"></li>
                <li class="square-1 primary"></li>
                <li class="square-2 warning1"></li>
                <li class="square-3 danger"></li>
                <li class="square-4 light"></li>
                <li class="square-5 warning"></li>
                <li class="square-6 success"></li>
                <li class="square-7 success"></li>
              </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card course-box"> 
              <div class="card-body"> 
                <div class="course-widget"> 
                  <div class="course-icon"> 
                    <svg class="fill-icon">
                      <use href="../assets/svg/icon-sprite.svg#course-1"></use>
                    </svg>
                  </div>
                  <div> 
                    <h4 class="mb-0">100+</h4><span class="f-light">Verifikasi Validasi</span>
                  </div>
                </div>
              </div>
              <ul class="square-group">
                <li class="square-1 warning"></li>
                <li class="square-1 primary"></li>
                <li class="square-2 warning1"></li>
                <li class="square-3 danger"></li>
                <li class="square-4 light"></li>
                <li class="square-5 warning"></li>
                <li class="square-6 success"></li>
                <li class="square-7 success"></li>
              </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card course-box"> 
              <div class="card-body"> 
                <div class="course-widget"> 
                  <div class="course-icon"> 
                    <svg class="fill-icon">
                      <use href="../assets/svg/icon-sprite.svg#course-1"></use>
                    </svg>
                  </div>
                  <div> 
                    <h4 class="mb-0">100+</h4><span class="f-light">Selesai</span>
                  </div>
                </div>
              </div>
              <ul class="square-group">
                <li class="square-1 warning"></li>
                <li class="square-1 primary"></li>
                <li class="square-2 warning1"></li>
                <li class="square-3 danger"></li>
                <li class="square-4 light"></li>
                <li class="square-5 warning"></li>
                <li class="square-6 success"></li>
                <li class="square-7 success"></li>
              </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-xl-6 box-col-12">
            <div class="card">
              <div class="card-header">
                <h5>bar-chart2</h5>
              </div>
              <div class="card-body chart-block">
                <canvas id="chartPermohonan"></canvas>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const chartPermohonan = document.getElementById('chartPermohonan').getContext('2d');
                                const permohonanChart = new Chart(chartPermohonan, {
                                type: 'bar',
                                data: {
                                    labels: [
                                        "Masuk",
                                        "Cek Kelengkapan",
                                        "Verifikasi Validasi",
                                        "Selesai"
                                    ],
                                    datasets: [{
                                        label : "JUMLAH PERMOHONAN REKOMENDASI LSP",
                                        data: [
                                            "1000",
                                            "450",
                                            "150",
                                            "400",
                                        ],
                                        backgroundColor: [
                                            'rgba(54, 162, 45, 0.5)',
                                            'rgba(27, 40, 255, 0.2)',
                                            'rgba(27, 40, 255, 0.2)',
                                            'rgba(54, 162, 2, 0.2)',
                                            
                                        ],
                                        borderColor: [
                                            'rgba(54, 162, 45, 1)',
                                            'rgba(27, 40, 255, 1)',
                                            'rgba(27, 40, 255, 1)',
                                            'rgba(54, 162, 2, 1)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                            });
</script>
@endpush