<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>M Ali Tofan - Test</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset("otika-assets/css/app.min.css")}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset("otika-assets/css/style.css")}}">
  <link rel="stylesheet" href="{{asset("otika-assets/css/components.css")}}">
  <link rel="stylesheet" href="{{asset("otika-assets/css/custom.css")}}">
 
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Sinkronisasi</h4>
              </div>
              <form action="{{route("sync.save")}}" method="post">
              @method("POST")
              @csrf
              <div class="card-body">
                <div class="alert alert-primary">Data belum tersinkronisasi dan masih kosong. Sinkronisasi sekarang dengan mengisi kredensial dibawah : </div>
                    <div class="form-group">
                        <label>ENDPOINT</label>
                        <input type="text" class="form-control" name="endpoint" value="https://recruitment.fastprint.co.id/tes/api_tes_programmer">
                        <span class="text-info">Ref : <a href="https://recruitment.fastprint.co.id/tes/tes/programmer/">https://recruitment.fastprint.co.id/tes/tes/programmer/</a></span>
                    </div>
                    <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" class="form-control" name="username" value="">
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="text" class="form-control" name="password" value="">
                        <span class="text-info">format : bisacoding-tanggal sekarang (angka)-bulan sekarang (angka)-2 digit terakhir tahun sekarang (angka), Contoh : bisacoding-12-20-21</span>
                    </div>
              </div>
              <div class="card-footer">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade mt-2">
                        <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{session('error')}}
                        </div>
                    </div>
                @endif
                <button class="btn btn-primary btn-sm" type="submit">Sinkronkan Sekarang</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset("otika-assets/js/app.min.js")}}"></script>
  <script src="{{asset("otika-assets/js/scripts.js")}}"></script>
  <script src="{{asset("otika-assets/js/custom.js")}}"></script>
</body>
</html>