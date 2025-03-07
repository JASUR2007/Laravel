<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
        name="description"
        content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5"
    />
    <meta name="author" content="AdminKit" />
    <meta
        name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/vue-router@4.0.0/dist/vue-router.global.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="{{ asset('admin/img/icon-48x48.png') }}" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <title>Teacher Panel</title>
    <script src="{{ asset('extends/fontawesome.js') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('admin/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/style.css') }}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
        rel="stylesheet"
    />



    <!-- pie chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
<div class="wrapper" id="app">
    @include('admin/extends/sidebar')

    <div class="main">
        @include('admin/extends/header')
        <main class="content">
            <div class="container-fluid p-0">
                <router-view></router-view>
            </div>
        </main>

        @include('admin/extends/footer')
    </div>
</div>

<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/users.js')}}"></script>
<script src="{{asset('admin/js/students.js')}}"></script>
<script src="{{asset('admin/js/teachers.js')}}"></script>
<script src="{{asset('admin/js/profile.js')}}"></script>
<script>
    const { createApp, provide } = Vue;
    const { createRouter, createWebHistory } = VueRouter;

    const routes = [
        { path: "/admin/dashboard", component: Dashboard },
        { path: "/admin/students", component: Students },
        { path: "/admin/teachers", component: Teacher },
        { path: "/admin/students", component: Students },
        { path: "/admin/users", component: Users },
        { path: "/admin/profile", component: Profile },
    ];

    const router = createRouter({
        history: createWebHistory(),
        routes
    });

    const app = createApp({
        data() {
            return {
                isClosed: false
            };
        },
        mounted() {

        },
        methods:{
          Sidebar_button() {
              let sidebar = document.getElementById('sidebar');
              sidebar.classList.toggle("closed");
          }
        },
        setup() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            provide("csrfToken", csrfToken);
        }
    });

    app.use(router);
    app.mount("#app");
</script>
</body>
</html>
