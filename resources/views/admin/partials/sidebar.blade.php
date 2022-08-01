<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>



                <!-- settings -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#settingLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Setting
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="settingLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('logo.setting') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Logo Setting
                        </a>

                        <a class="nav-link" href="{{ route('team.setting') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Team Setting
                        </a>

                        <a class="nav-link" href="{{ route('partner.setting') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Partner Setting
                        </a>

                        <a class="nav-link" href="{{ route('blog.setting') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Blog Setting
                        </a>

                    </nav>
                </div>


                <!-- forms -->
                <div class="sb-sidenav-menu-heading">Forms</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Add
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- <a class="nav-link" href="{{ route('admin.manage.category') }}">Category</a>
                        <a class="nav-link" href="{{ route('admin.manage.subCategory') }}">Sub-Category</a> --}}
                        <a class="nav-link" href="{{ route('admin.manage.product') }}">Product</a>
                        <a class="nav-link" href="{{ route('admin.manage.service')}}">Services</a>
                        <a class="nav-link" href="{{ route('admin.manage.stock') }}">Stock</a>
                        <a class="nav-link" href="{{ route('admin.manage.offer') }}">Package</a>
                    </nav>
                </div>
                <!-- table -->
                <div class="sb-sidenav-menu-heading">Table</div>
                <a class="nav-link" href="{{ route('admin.manage.order') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Order
                </a>
                <a class="nav-link" href="{{ route('admin.manage.customer') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Customer
                </a>
                <a class="nav-link" href="{{ route('admin.view.report') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Report
                </a>
                <!-- website footer -->
                <div class="sb-sidenav-menu-heading">footer</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                    Refund Policy
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Terms and Condition
                </a>
            </div>
        </div>

    </nav>
</div>
