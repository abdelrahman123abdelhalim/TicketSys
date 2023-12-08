<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a class="brand-link d-flex align-items-center" style="white-space: normal;">
		<img src="{{ asset('storage/images/'. Auth::user()->image) }}" style="weight:50px; height:50px" alt="User Image"
			class="mr-2">
		<span class="text-white">
			<span class="brand-text font-weight-bold">مرحبا</span>&nbsp;
			<span class="brand-text font-weight-light"
				style="overflow: visible; white-space: normal;">{{ Auth::user()->name }}</span>
		</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
					alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"></a>
			</div>
		</div> -->

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li
					class="nav-item has-treeview {{(request()-> is('admin/Panel_Settings*')||request()-> is('admin/Treasuries*') )?'menu-open' : '' }}">
					<a href="#" class="nav-link  {{(request()-> is('tickets/*'))?'active' : '' }}">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							تذكرة الشكوى
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						<li class="nav-item">
							<a href="{{route('add.NewTicket')}}"
								class="nav-link {{(request()-> is('tickets/*'))?'active' : '' }}">
								<p>إضافة تذكرة جديده
								</p>
							</a>
						</li>
					</ul>

				</li>


		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>