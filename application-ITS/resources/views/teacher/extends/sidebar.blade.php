<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <router-link class="sidebar-brand" to="/teacher/dashboard">
            <span class="align-middle">Admin</span>
        </router-link>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item" :class="{ active: $route.path === '/teacher/dashboard' }">
                <router-link class="sidebar-link" to="/teacher/dashboard">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </router-link>
            </li>

            <li class="sidebar-item" :class="{ active: $route.path === '/teacher/timetable' }">
                <router-link class="sidebar-link" to="/teacher/timetable">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Timetable</span>
                </router-link>
            </li>

            <li class="sidebar-item" :class="{ active: $route.path === '/teacher/profile' }">
                <router-link class="sidebar-link" to="/teacher/profile">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Profile</span>
                </router-link>
            </li>

            <li class="sidebar-item" :class="{ active: $route.path === '/dashboard/profile' }">
                <router-link class="sidebar-link" to="/dashboard/profile">
                    <i class="align-middle" data-feather="log-in"></i>
                    <span class="align-middle">Sign In</span>
                </router-link>
            </li>
        </ul>
    </div>
</nav>
