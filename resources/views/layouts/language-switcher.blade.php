<div class="dropdown mr-4">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ strtoupper($current_locale) }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach($available_locales as $locale_name => $available_locale)
            <a class="dropdown-item" href="language/{{ $available_locale }}">{{ $locale_name }}</a>
        @endforeach
    </div>
</div>
