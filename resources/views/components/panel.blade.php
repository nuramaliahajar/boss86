<div class="panel panel-bordered">
    <header class="panel-heading">
        <h3 class="panel-title">{{ $title }}</h3>
        {{ $addon }}
    </header>
    
    <div class="panel-body">
        {{ $slot }}
    </div>

    {{ $footer }}
</div>