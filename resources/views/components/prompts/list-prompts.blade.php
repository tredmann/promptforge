@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><span>Prompts</span></li>
    </ul>
@endsection

<div>

    <div class="uk-flex uk-flex-between">
        <h1 class="uk-h2">Prompts</h1>
        <div>
            <a class="uk-button uk-button-primary" href="{{ route('create-prompt')  }}">Add</a>
        </div>
    </div>

    <div class="uk-child-width-1-2@m uk-grid-small uk-grid-match" uk-grid>
    @foreach($prompts as $prompt)
        <div>
            <a
                    class="uk-display-block uk-card uk-link-toggle uk-card-default uk-card-body uk-card-small uk-card-hover"
                    href="{{ route('show-prompt', ['prompt' => $prompt]) }}"
            >
                <h2 class="uk-card-title "><span class="uk-link-heading" >{{ $prompt->title }}</span></h2>
                <p>{{ $prompt->description ?? '-' }}</p>
            </a>
        </div>

    @endforeach
    </div>
</div>
