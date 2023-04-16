<div class="d-flex align-items-center text-secondary">
    @foreach ($breadcrumbRoutes as $route)
        <a href="{{ $route['url'] }}" class="text-reset text-decoration-none text-nowrap breadcrumb-link">{{ $route['name'] }}</a>
        @if ($loop->index < count($breadcrumbRoutes) - 1)
            <span class="material-icons mt-1">chevron_right</span>
        @endif
    @endforeach
</div>