<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>{{$user->name}} {{$user->title ? "- {$user->title} " : "" }} {{$user->company ? "- {$user->company} " : "" }}- {{config('app.name')}}</title>

  <link rel="apple-touch-icon" sizes="57x57" href="{{asset("favicons/apple-icon-57x57.png")}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset("favicons/apple-icon-60x60.png")}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset("favicons/apple-icon-72x72.png")}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset("favicons/apple-icon-76x76.png")}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset("favicons/apple-icon-114x114.png")}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset("favicons/apple-icon-120x120.png")}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset("favicons/apple-icon-144x144.png")}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset("favicons/apple-icon-152x152.png")}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset("favicons/apple-icon-180x180.png")}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{asset("favicons/android-icon-192x192.png")}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicons/favicon-32x32.png")}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset("favicons/favicon-96x96.png")}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicons/favicon-16x16.png")}}">
  <link rel="manifest" href="{{asset("favicons/manifest.json")}}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="{{asset("css/mdb.min.css")}}" />
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    html {
      position: relative;
      min-height: 100%;
    }

    body {
      margin-bottom: 20px;
      /* Margin bottom by footer height */
    }

    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 20px;
      /* Set the fixed height of the footer here */
      line-height: 20px;
      /* Vertically center the text there */
    }

    .content {
      display: none;
    }

    .loader {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -50px;
      margin-left: -50px;
      3
    }

    .custom-loader {
      width: 100px;
      height: 100px;
      display: grid;
      border: 8px solid #0000;
      border-radius: 50%;
      border-color: #6C757D #0000;
      animation: s6 2s infinite linear;
    }

    .custom-loader::before,
    .custom-loader::after {
      content: "";
      grid-area: 1/1;
      margin: 4px;
      border: inherit;
      border-radius: 50%;
    }

    .custom-loader::before {
      border-color: #0D6EFD #0000;
      animation: inherit;
      animation-duration: 1s;
      animation-direction: reverse;
    }

    .custom-loader::after {
      margin: 16px;
    }

    @keyframes s6 {
      100% {
        transform: rotate(1turn)
      }
    }
  </style>
</head>

<body>

  <!-- Start your project here-->
  <div class="loader">
    <div class="d-flex justify-content-center my-auto">
      <div class="custom-loader"></div>
    </div>
  </div>
  <!-- Just an image -->
  <div class="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container">
        <!-- Collapsible wrapper -->
          <!-- Navbar brand -->
          <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <img src="{{asset("img/LinkardLogo.png")}}" height="15" alt="MDB Logo"
              loading="lazy" />
          </a>

        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Avatar -->
          <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="{{asset("img/avatar.png")}}" class="rounded-circle" height="25"
                alt="Black and White Portrait of a Man" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="{{asset("/profile")}}">My profile</a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                </form>

              </li>
            </ul>
          </div>
        </div>
        <!-- Right elements -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <section class="bg-light pb-5">
      <div class="container py-3">
        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-body text-center">
                <img src="{{asset("img/avatar.png")}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">{{$user->name}}</h5>
                <p class="text-muted mb-4">
                    {{$user->title}}
                    <br>
                    {{$user->company}}
                </p>
                <div class="d-flex justify-content-center mb-2">
                  <a href="/p/{{$card->cid}}/download" class="btn btn-primary">Save Contact</a>
                  {{-- @if (Auth::user())
                  <a href="/edit.html" class="btn btn-outline-primary ms-1">Update Info</a>
                  @endif --}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$user->name}}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$user->email}}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$user->phone}}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Work Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$user->work_phone}}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$user->full_address}}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3 mb-lg-3">
              <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fas fa-globe fa-lg text-warning"></i>
                    <a href="{{$user->website}}">
                      <p class="mb-0">{{$user->website}}</p>
                    </a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                    <a href="{{$user->github}}">
                        <p class="mb-0">{{$user->github}}</p>
                    </a>
                </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                    <a href="{{$user->twitter}}">
                        <p class="mb-0">{{$user->twitter}}</p>
                    </a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                    <a href="{{$user->instagram}}">
                        <p class="mb-0">{{$user->instagram}}</p>
                    </a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-youtube fa-lg" style="color: #ff0000;"></i>
                    <a href="{{$user->youtube}}">
                        <p class="mb-0">{{$user->youtube}}</p>
                    </a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-tiktok fa-lg" style="color: #ff0050;"></i>
                    <a href="{{$user->tiktok}}">
                        <p class="mb-0">{{$user->tiktok}}</p>
                    </a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                    <a href="{{$user->facebook}}">
                        <p class="mb-0">{{$user->facebook}}</p>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted fixed-bottom">
      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        <a href="https://linkard.io" target="_blank" rel="noopener noreferrer">Get Yourself a Linkard</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>

  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="{{asset("js/mdb.min.js")}}"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
    $(window).on('load', function () {
      $('.loader').fadeOut(3000);
      $('.content').fadeIn(3000);
    });
  </script>
</body>

</html>
