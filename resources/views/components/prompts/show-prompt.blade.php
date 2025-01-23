@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('list-prompts')  }}">Prompts</a></li>
        <li><span>{{ $prompt->title }}</span></li>
    </ul>
@endsection

<div>
    <div class="uk-flex uk-flex-between">
        <h1 class="uk-h2">{{ $prompt->title  }}</h1>
        <div>
            <a class="uk-button uk-button-primary" href="">Edit</a>
        </div>
    </div>

    <div>
    {{ $prompt->description }}
    </div>

    <div>
        <div class="uk-text-meta uk-margin-top">Prompt:</div>
        <div><pre>{{ $prompt->prompt }}</pre></div>
    </div>


    <div>
        <div class="uk-text-meta uk-margin-top">Response Type:</div>
        <div>{{ $prompt->response_type ?? '-' }}</div>
    </div>

    <div>
        <div class="uk-text-meta uk-margin-top">Response Schema:</div>
        <div>{{ $prompt->response_schema ?? '-' }}</div>
    </div>

    <div class="uk-margin-large-top">
        <div class="uk-flex uk-flex-between">
            <h2 class="uk-h3">Endpoints</h2>

        </div>
        <livewire:endpoint-panel :prompt="$prompt"/>
    </div>

{{--    <div class="uk-margin-large-top">--}}
{{--        <div class="uk-flex uk-flex-between">--}}
{{--            <h2 class="uk-h3">Requests</h2>--}}
{{--            <div>--}}
{{--                <a class="uk-button uk-button-primary" href="{{route('create-prompt-request', ['prompt' => $prompt])}}">Add</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <livewire:request-panel :prompt="$prompt"/>--}}
{{--    </div>--}}


</div>


