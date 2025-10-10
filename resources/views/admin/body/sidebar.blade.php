  <!-- ========== Left Sidebar Start ========== -->
  <div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{url('/')}}">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-danger badge-pill float-right">3</span>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Manage Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('all.category')}}">All Category</a></li>
                        <li><a href="{{route('all.subcategory')}}">All SubCategory</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Manage Author </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('all.author')}}">All Author</a></li>


                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> Manage Ebook </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('all.ebook')}}">All Ebook</a></li>
                        <li><a href="{{route('add.ebook')}}">Add Ebook</a></li>


                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> Manage App </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('edit.ads')}}">Mange Ads</a></li>

                    </ul>
                </li>


                <li class="menu-title mt-2">More</li>

                <li>
                        <a href="javascript: void(0);">
                            <i class="fe-map"></i>
                            <span> Maps </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="maps-google.html">Google Maps</a></li>
                                <li><a href="maps-vector.html">Vector Maps</a></li>
                                <li><a href="maps-mapael.html">Mapael Maps</a></li>
                        </ul>
                    </li>


                    <li>
                            <a href="calendar.html">
                                <i class="fe-clock"></i>
                                <span> Calendar </span>
                            </a>
                        </li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-book-open"></i>
                        <span> Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                         <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-login.html">Login</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-logout.html">Logout</a></li>
                                    <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="pages-confirm-mail.html">Confirm Mail</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-404-alt.html">Error 404-alt</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-plus-square"></i>
                        <span class="badge badge-success badge-pill float-right">Hot</span>
                        <span> Extra Pages </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="extras-timeline.html">Timeline</a></li>
                            <li><a href="extras-invoice.html">Invoice</a></li>
                            <li><a href="extras-faq.html">FAQ</a></li>
                            <li><a href="extras-pricing.html">Pricing</a></li>
                            <li><a href="extras-email-template.html">Email Templates</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-share-2"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);">Level 1.1</a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li>
                                    <a href="javascript: void(0);">Level 2.1</a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">Level 2.2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
