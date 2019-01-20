<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: blue">
    <div class="container">
        <a class="navbar-band" href="/admin/posts">Admin</a>
        <button class="navbar-toggler navbar-right" type="button" data-toggle="collapse">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/" class="navbar-link">Blog</a>
                </li>
            </ul>
    </div>

</nav>

<!-- Page Header -->
<header class="masthead"></header>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif