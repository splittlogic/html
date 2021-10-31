<!DOCTYPE html>
<html class="h-100">
	{!! html::head() !!}
	<body{!! html::getBodyAttributes() !!}>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('splittlogic.html') }}">Splittlogic/html</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('splittlogic.html.elements') }}">Elements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('splittlogic.html.settings') }}">Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('splittlogic.html.globals') }}">Globals</a>
              </li>
            </ul>
            <form class="d-flex" method="POST" action="{{ route('splittlogic.html.search') }}">
              <input list="searchTerms" name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							{!! html::aboutSearch() !!}
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <main class="flex-shrink-0">
      <div class="container" style="padding-top: 60px;">

		@if (isset($content))
			{!! $content !!}
		@endif

      </div>
    </main>

	</body>
</html>
