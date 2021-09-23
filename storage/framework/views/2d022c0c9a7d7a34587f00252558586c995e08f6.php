<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/logo/fav_evoush.png">
                </div>
                <div class="sidebar-brand-text mx-3"> </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/" target="_blank">
                    <i class="fas fa-fw fa-atlas"></i>
                    <span>View Website</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Utilities Manage:</h6>
                        <a class="collapse-item" href="<?php echo e(route('menus.index')); ?>">List Menu</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Website Manage
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-users-cog"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Management</h6>
                        <a class="collapse-item" href="<?php echo e(route('users.index')); ?>">Users</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Products</span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Evoush Product:</h6>
                        <a class="collapse-item" href="<?php echo e(route('categories.index')); ?>">Category Product</a>
                        <a class="collapse-item" href="<?php echo e(route('products.index')); ?>">Product List</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>

                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-luggage-cart"></i>
                    <span>Ordes</span>
                </a>
                <div id="collapseOrder" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Evoush Order:</h6>
                        <a class="collapse-item" href="<?php echo e(route('orders.create')); ?>">Create Order</a>
                        <a class="collapse-item" href="<?php echo e(route('orders.index')); ?>">Order List</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMessage"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Message</span>
                </a>
                <div id="collapseMessage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Evoush Contact Message:</h6>
                        <a href="<?php echo e(route('categorymessage.index')); ?>" class="collapse-item">Category Message</a>
                        <a href="<?php echo e(route('contact.index')); ?>" class="collapse-item">Contact Message</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Event</span>
                </a>
                <div id="collapseEvent" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Evoush Contact Message:</h6>
                        <a href="<?php echo e(route('event.index')); ?>" class="collapse-item">Event Lists</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>

                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsult"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-stethoscope"></i>
                    <span>Consults</span>
                </a>
                <div id="collapseConsult" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Consultation Dokter</h6>
                        <a href="<?php echo e(route('consults.index')); ?>" class="collapse-item">Consult Lists</a>
                        <div class="collapse-divider"></div>
                        <a href="<?php echo e(route('delivers.index')); ?>" class="collapse-item">Deliver To Dokter</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar --><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/layouts/dashboard/Partial/sidebar.blade.php ENDPATH**/ ?>