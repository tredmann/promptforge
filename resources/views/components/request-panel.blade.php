<div>
    @if($prompt->requests->count() > 0)

        <table class="uk-table uk-table-small uk-table-divider">
            <thead>
                <tr>
                    <th>State</th>
                    <th>Provider</th>
                    <th>Model</th>
                    <th>Temperature</th>
                    <th>Time</th>
                </tr>
            </thead>

            <tbody>

                    @foreach($prompt->requests as $request)
                        <tr>
                            <td>
                                @if($request->state === \App\Enums\RequestState::Succeeded)
                                    <span class="uk-label uk-label-success">{{ $request->state->value }}</span>
                                @elseif($request->state === \App\Enums\RequestState::Pending || $request->state === \App\Enums\RequestState::Queued)
                                    <span class="uk-label uk-label-warning">{{ $request->state->value }}</span>
                                @else
                                    <span class="uk-label uk-label-danger">{{ $request->state->value }}</span>
                                @endif

                            </td>
                            <td>{{ $request->provider }}</td>
                            <td>{{ $request->model }}</td>
                            <td>{{ $request->temperature }}</td>
                            <td><a href="{{route('show-prompt-request', ['request' => $request, 'prompt' => $prompt])}}">{{ $request->started_at->format('d.m.Y H:i:s') }}
                            @if($request->state === \App\Enums\RequestState::Failed || $request->state === \App\Enums\RequestState::Succeeded)
                                - {{ $request->started_at->diffInSeconds($request->finished_at) }} sec
                                    @endif</a>
                            </td>
                        </tr>
                  @endforeach


            </tbody>

        </table>

    @endif

</div>
