<div>
    @if($prompt->requests->count() > 0)

        <table class="uk-table uk-table-small uk-table-divider">
            <thead>
                <tr>
                    <th>Provider</th>
                    <th>Model</th>
                    <th>API</th>
                    <th>Frontend</th>
                    <th>Usages</th>
                </tr>
            </thead>

            <tbody>

                    @foreach($prompt->requests as $request)
                        <tr>
                            <td>{{ $request->provider }}</td>
                            <td>{{ $request->model }}</td>
                            <td><input class="uk-checkbox" type="checkbox"/></td>
                            <td>
                                <a target="_blank" href="{{ route('show-frontend-request', ['request' => $request]) }}">Open</a>
                            </td>
                            <td>0 | <a wire:click="dispatchJob('{{$request->id}}')">Start</a></td>
                        </tr>
                  @endforeach


            </tbody>

        </table>

    @endif


    <form class="uk-form uk-form-stacked uk-margin-large-top" wire:submit="add">
        <div class="uk-width-1-3@s">
            <x-forms.textinput name="provider" label="Provider" required="true" wire:model.live="provider"/>
        </div>
        <div class="uk-width-1-3@s">
            <x-forms.textinput name="model" label="Model" required="true" wire:model.live="model"/>
        </div>
        <div class="uk-width-1-3@s">
            <button class="uk-button uk-button-primary">Add</button>
        </div>
    </form>
</div>
