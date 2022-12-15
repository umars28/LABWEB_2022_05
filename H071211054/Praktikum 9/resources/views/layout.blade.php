<!DOCTYPE html>
<html>
<head>
    <title>Contact Laravel 9 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./categories">Category</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./products">Product</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./permissions">Permission</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./sellers">Seller</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./sellers_permissions">Seller Permission</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    @yield('content')
</div>
  
</body>
</html>