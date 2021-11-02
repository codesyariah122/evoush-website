<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/logo/fav_evoush.png">
                </div>
                <div class="sidebar-brand-text mx-3"> {{-- {{strtolower($brand)}} --}}</div>
            </a>

            <!-- Nav Item - Dashboard -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMembers"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Profile Editor</span>
                </a>
                <div id="collapseMembers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Utilities Manage:</h6>
                        <a class="collapse-item" href="{{route('profile.edit', [Auth::user()->id])}}">Edit Profile</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Management</h6>
                        <a class="collapse-item" href="{{route('users.index')}}">Users</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMember"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Members</span>
                </a>
                <div id="collapseMember" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Member Management</h6>
                        <a class="collapse-item" href="{{route('member.index')}}">Members</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMessage"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Message</span>
                </a>
                <div id="collapseMessage" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header">Evoush Contact Message:</h6>
                        <a href="{{route('categorymessage.index')}}" class="collapse-item">Category Message</a>
                        <a href="{{route('contact.index')}}" class="collapse-item">Contact Message</a>
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
                        <a href="{{route('consults.index')}}" class="collapse-item">Consult Lists</a>
                        <div class="collapse-divider"></div>
                        <a href="{{route('delivers.index')}}" class="collapse-item">Deliver To Dokter</a>
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
        <!-- End of Sidebar -->