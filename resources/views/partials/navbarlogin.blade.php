<header class="headerboard">
		<a href="#" class="logo"> 
			<img src="{{ asset('/img/it-logo-blue.png') }}"> Interact
		</a>
		<input class="menu-btn" type="checkbox" id="menu-btn" />
		<label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

		<ul class="menu">
		<li>
			<a class="search">
				<input type="text" name="finder" placeholder="Search friends.." class="search-profile" id="findup" value="">
			</a>
		</li>
		<li>
			<a href="{{ route('home.show', Auth::user()->uid) }}" title="Dashboard Home">Home</a>
		</li>
		<li>
			<a href="{{ route('user.show', Auth::user()->uid) }}" title="Profile">Profile</a>
		</li>
			<li>
				<a href="/logout">
					<div class="loginuri">
						<img src="{{ asset('/img/logout.png') }}" class="logout_user"/>
						<div class="login_title">Logout</div>
					</div>
				</a>
			</li>
		</ul> 
	</header>