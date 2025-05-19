  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Portfolio Project Management - @yield('title', 'Home')</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <div class="d-flex flex-column min-vh-100">
      <header class="bg-primary text-white shadow">
          <div class="container py-3">
              <nav class="navbar navbar-expand-lg">
                  <div class="container-fluid">
                      <a class="navbar-brand text-white" href="{{ url('/') }}">Portfolio App</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav ms-auto">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('project.index')}}">Projects</a>
                              </li>
                              <li class="nav-item">
                                <a href="{{route('project.create')}}" class="nav-link">Create</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
          </div>
      </header>

      <main class="container py-4 flex-grow-1">
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          @yield('content')
      </main>

      <footer class="bg-dark text-white text-center py-3">
          <p>Made by Eshan</p>
      </footer>

    </div>
  </body>
  </html>