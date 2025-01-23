@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('list-prompts')  }}">Prompts</a></li>
        <li><a href="{{ route('show-prompt', ['prompt' => $prompt]) }}">{{ $prompt->title }}</a></li>
        <li><span>Request from {{ $request->started_at->format('d.m.Y H:i:s')  }}</span></li>
    </ul>
@endsection

<div>

    @if(isset($request->response))
    <pre>{{ $request->response->response }}</pre>
        @else
        <div wire:poll="refreshResponse">
            <pre>{{ $request->response?->response ?? 'loading'}}</pre>
        </div>
    @endif
</div>
