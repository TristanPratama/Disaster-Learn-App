<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Page</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/logo_UKH.png') }}">

    <!-- Custom Icon from FontAwesome -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom Font from Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="bg-doodle2">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-primary topbar static-top mb-4 shadow">
                    <div class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                        <div class="sidebar-brand-text mx-3 text-gray-100">
                            Survey App |
                            <img src="{{ asset('/img/logo_UKH.png') }}" alt="" width="5%" height="auto">
                            <img src="{{ asset('/img/logo_POLTEKES.png') }}" alt="" width="5%" height="auto">
                            <img src="{{ asset('/img/logo_ICS.png') }}" alt="" width="5%" height="auto">
                        </div>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Tob Bar Divider -->
                        <div class="topbar-divider d-none d-sm-block">&nbsp;</div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-md-none d-lg-inline text-gray-100 small">{{ Auth::user()->name }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <span class="dropdown-item">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    @if (Auth::user()->role == 'responden')
                                        <span class="text-capitalize">Responden</span>
                                    @else
                                        <span class="text-capitalize">Telah Mengisi Test</span>
                                    @endif
                                </span>
                                <div class="dropdown-divider"></div>
                                {{-- <a class="dropdown-item" href="../index.html" data-toggle="modal" data-target="#logoutModal"> --}}
                                <a class="dropdown-item" href="{{ route('actionlogout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('actionlogout') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('container')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            {{-- @include('layouts.partials.footer') --}}
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; The Effect of a Disaster Management Learning Application on Improving Disaster Preparedness: A Research Team Study</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
          const myCheckbox = document.getElementById("myCheckbox");
          const myButton = document.getElementById("myButton");

          myButton.classList.add("disabled");

          myCheckbox.addEventListener("change", function () {
            if (myCheckbox.checked) {
              myButton.classList.remove("disabled");
            } else {
              myButton.classList.add("disabled");
            }
          });
        });
    </script>

    <script>
        // Function to handle the YouTube API ready event
        function onYouTubeIframeAPIReady() {
        var player = new YT.Player('video-iframe', {
            events: {
            'onStateChange': onPlayerStateChange
            }
        });
        }

        // Function to handle video state changes
        function onPlayerStateChange(event) {
        // Check if the video has ended
        if (event.data === YT.PlayerState.ENDED) {
            // Enable the "Selanjutnya" button
            document.getElementById('next-page-button').classList.remove('disabled');
        }
        }
    </script>

    <script src="https://www.youtube.com/iframe_api"></script>

</body>
</html>
