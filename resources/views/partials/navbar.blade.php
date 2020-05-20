<header class="headerm">
    <a href="{{ route('index.home') }}" class="logo">
      <img src="{{ asset('/img/it-logo-purple.png') }}"> Interact
    </a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn">
        <span class="navicon"></span>
    </label>
    
    <ul class="menu">
        <li><a href="{{ route('index.about') }}" title="about">About?</a></li>
        <li><a href="{{ route('index.contact') }}" title="contact us">Contact</a></li>
        <li>
            <a href="/login">
                <div class="loginuri">
                    <img src="{{ asset('/img/user.png') }}" class="login_user"/>
                    <div class="login_title">Sign In</div>
                </div>
            </a>
        </li>
    </ul>
</header>