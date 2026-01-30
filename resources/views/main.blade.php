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
  <style>
    .actions-cell {
    position: relative;
    padding-right: 80px; /* ruang aman */
    }

    .actions-space {
        position: relative;
        z-index: 1;
    }

    .actions-button {
      position: absolute;
      top: 50%;
      right: 8px;
      transform: translateY(-50%);
      display: flex;
      gap: 6px;

      opacity: 0;
      pointer-events: none;
      transition: all 0.25s ease;

      /* background: rgba(255, 255, 255, 0.55); */
      backdrop-filter: blur(6px);
      border-radius: 8px;
      padding: 4px 6px;
    }

    /* Muncul saat hover row */
    tr:hover .actions-button {
        opacity: 1;
        pointer-events: auto;
    }

    /* Tombol */
    .custom-btn-action {
        border: none;
        background: transparent;
        cursor: pointer;
        padding: 4px;
        border-radius: 6px;
        color: #555;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .custom-btn-action:hover {
        background: rgba(64, 36, 190, 0.08);
    }

    /* .custom-btn-action.detail:hover { color: #0d6efd; }
    .custom-btn-action.edit:hover   { color: #ffc107; }
    .custom-btn-action.delete:hover { color: #dc3545; } */
  </style>
  @yield('css')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 ">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Data Produk <span class="text-secondary">@yield('subtitle')</span></h4>
              </div>
              <div class="card-body">
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @yield('content2')
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset("otika-assets/js/app.min.js")}}"></script>
  <script src="{{asset("otika-assets/js/scripts.js")}}"></script>
  <script src="{{asset("otika-assets/js/custom.js")}}"></script>
  @yield('script')
</body>
</html>