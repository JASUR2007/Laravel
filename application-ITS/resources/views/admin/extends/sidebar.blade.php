<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <router-link class="sidebar-brand" to="/teacher/dashboard">
            <span class="align-middle">Admin</span>
        </router-link>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item" :class="{ active: $route.path === '/admin/dashboard' }">
                <router-link class="sidebar-link" to="/teacher/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-sliders align-middle"><line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                    <span class="align-middle">Dashboard</span>
                </router-link>
            </li>

            <li class="sidebar-item" :class="{ active: $route.path === '/admin/students' }">
                <router-link class="sidebar-link" to="/teacher/timetable">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Students</span>
                </router-link>
            </li>

            <li class="sidebar-item" :class="{ active: $route.path === '/admin/teachers' }">
                <router-link class="sidebar-link" to="/teacher/profile">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Teachers</span>
                </router-link>
            </li>
            <li class="sidebar-item" :class="{ active: $route.path === '/admin/users' }">
                <router-link class="sidebar-link" to="/dashboard/profile">
                    <i class="align-middle" data-feather="log-in"></i>
                    <span class="align-middle">Users</span>
                </router-link>
            </li>
            <li class="sidebar-item" :class="{ active: $route.path === '/admin/profile' }">
                <router-link class="sidebar-link" to="/dashboard/profile">
                    <i class="align-middle" data-feather="log-in"></i>
                    <span class="align-middle">Profile</span>
                </router-link>
            </li>
            <li class="sidebar-item" :class="{ active: $route.path === '/admin/settings' }">
                <router-link class="sidebar-link" to="/dashboard/profile">
                    <i class="align-middle" data-feather="log-in"></i>
                    <span class="align-middle">Settings</span>
                </router-link>
            </li>
        </ul>
    </div>
</nav>
