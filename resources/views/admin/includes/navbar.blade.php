  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  	<!-- Left navbar links -->
  	<ul class="navbar-nav">
  		<li class="nav-item">
  			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
  		</li>
  		<li class="nav-item d-none d-sm-inline-block">
  			<a href="{{route('admin.tickets.index')}}" class="nav-link">الرئيسية</a>
  		</li>
  		<li class="nav-item d-none d-sm-inline-block">
  			<form action="{{ route('admin.logout') }}" method="POST">
  				@csrf
  				<button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer;">
  					تسجيل الخروج
  				</button>
  			</form>
  		</li>
  	</ul>

  </nav>
  <!-- /.navbar -->