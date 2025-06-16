<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">MyApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <!-- Products Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="productsDropdown">
            <li><a class="dropdown-item" href="{{ route('products.index') }}">Overview</a></li>
            <li><a class="dropdown-item" href="{{ route('products.create') }}">Create</a></li>
          </ul>
        </li>

        <!-- Messages Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-bs-toggle="dropdown">
            Messages
          </a>
          <ul class="dropdown-menu" aria-labelledby="messagesDropdown">
            <li><a class="dropdown-item" href="{{ route('messages.index') }}">Overview</a></li>
            <li><a class="dropdown-item" href="{{ route('messages.create') }}">Create</a></li>
          </ul>
        </li>

        <!-- Orders Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button" data-bs-toggle="dropdown">
            Orders
          </a>
          <ul class="dropdown-menu" aria-labelledby="ordersDropdown">
            <li><a class="dropdown-item" href="{{ route('orders.index') }}">Overview</a></li>
            <li><a class="dropdown-item" href="{{ route('orders.create') }}">Create</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
