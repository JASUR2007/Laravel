<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('admin/img/icon-48x48.png') }}" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('admin/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('extends/fontawesome.js') }}" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<main class="d-flex w-100" id="app">
    <form class="container d-flex flex-column" @submit.prevent="loginUser">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center">
                        <h1 class="h2">Welcome back!</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>
                    @if(Auth::check())
                        <p>Привет, {{ Auth::user()->name }}</p>
                    @else
                        <p>Вы не авторизованы</p>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="text" name="text" placeholder="Enter your login" v-model="login"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" v-model="password"/>
                                    </div>
                                    <div>
                                        <div class="form-check align-items-center">
                                            <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                                            <label class="form-check-label text-small" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-lg btn-primary">Sign in</button>
                                    </div>
                                    <p v-if="errorMessage" style="color: #ab2525;">@{{ errorMessage }}</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<script>
    const { createApp, ref } = Vue;
    createApp({
        setup() {
            const login = ref('');
            const password = ref('');
            const loading = ref(false);
            const errorMessage = ref('');

            const loginUser = async () => {
                loading.value = true;
                errorMessage.value = '';

                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                let formData = new FormData();
                formData.append("login", login.value);
                formData.append("password", password.value);
                formData.append("_token", csrfToken);

                try {
                    let response = await fetch(window.location.href + "login-reg", {
                        method: "POST",
                        body: formData
                    });

                    let result = await response.json();
                    if (response.ok) {
                        console.log(response)
                        window.location.href = result.redirect;
                    } else {
                        errorMessage.value = result.error || "Ошибка входа";
                    }
                } catch (error) {
                    errorMessage.value = "Ошибка соединения";
                } finally {
                    loading.value = false;
                }
            };

            return { login, password, loading, errorMessage, loginUser };
        }
    }).mount('#app');
</script>
<script src="{{ asset('admin/app.js') }}"></script>
</body>
</html>
