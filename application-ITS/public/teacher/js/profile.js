const Profile = {
    template:`
   			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
						
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="img/avatars/teacher_photo.jpg" alt="Ahmadaliyev Farrux" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">Ahmadaliyev Farrux</h5>
									<div class="text-muted mb-2">Teacher</div>

									
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Skills</h5>
									<a href="#" class="badge bg-primary me-1 my-1">Business Analytics & Data Science</a>
									<a href="#" class="badge bg-primary me-1 my-1">Marketing & Digital Marketing</a>
									<a href="#" class="badge bg-primary me-1 my-1">Finance & Investment</a>
									<a href="#" class="badge bg-primary me-1 my-1">Entrepreneurship & Startups</a>
									<a href="#" class="badge bg-primary me-1 my-1">Corporate Strategy & Management</a>
									<a href="#" class="badge bg-primary me-1 my-1">IT Systems Manager</a>
									<a href="#" class="badge bg-primary me-1 my-1">Trading & Financial Markets</a>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">Tashent, Uzbekistan</a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">PDP University, Investment company</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Tashkent</a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><a href="#">Telegram</a></li>
										<li class="mb-1"><a href="#">Gmail</a></li>
										<li class="mb-1"><a href="#">Facebook</a></li>
										<li class="mb-1"><a href="#">Instagram</a></li>
										<li class="mb-1"><a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Messages</h5>
								</div>
								<div class="card-body h-100">

									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle me-2" alt="Vanessa Tucker">
										<div class="flex-grow-1">
											<small class="float-end text-navy">5m ago</small>
											<strong>Ko'rpachagul Shodiyeva</strong> sent a new message <strong>Ahmadaliyev Farrux</strong><br />
											<small class="text-muted">Today 7:51 pm</small><br />

										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
										<div class="flex-grow-1">
											<small class="float-end text-navy">30m ago</small>
											<strong>Aminjon Samiev</strong> posted something on <strong>Ahmadaliyev Farrux</strong>'s timeline<br />
											<small class="text-muted">Today 7:21 pm</small>

											<div class="border text-sm text-muted p-2 mt-1">
												Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque et perspiciatis unde aut ipsum, molestias neque minima, atque earum vitae eligendi recusandae nostrum pariatur quam iste, voluptas quae corrupti facilis.
											</div>

											<a href="#" class="btn btn-sm btn-warning mt-1"><i class="feather-sm" data-feather="mail"></i> Reply</a>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1h ago</small>
											<strong>Oyqizi Ro'ziyeva</strong> posted sent a new message<br />

											<small class="text-muted">Today 6:35 pm</small>
										</div>
									</div>


									

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>Oygul Samadova</strong> posted a new blog<br />
											<small class="text-muted">Yesterday 2:43 pm</small>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>Akrom Ro'ziyev</strong> sent a new message<br />
											<small class="text-muted">Yesterdag 1:51 pm</small>
										</div>
									</div>

									<hr />
									<div class="d-grid">
										<a href="#" class="btn btn-primary">Load more</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
    `
}