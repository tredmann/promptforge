<div>
    @if($prompt->endpoints()->count() > 0)

        <table class="uk-table uk-table-small uk-table-divider">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Provider</th>
                    <th>Model</th>
                    <th>Temperature</th>
                    <th>Frontend</th>
                    <th>API</th>
                </tr>
            </thead>

            <tbody>
                @foreach($prompt->endpoints as $endpoint)
                <tr>
                    <td>{{$endpoint->name}}</td>
                    <td>{{$endpoint->provider}}</td>
                    <td>{{$endpoint->model}}</td>
                    <td>{{$endpoint->temperature}}</td>
                    <td>Frontend</td>
                    <td><a href="{{route('api-endpoint', ['endpoint' => $endpoint])}}">API</a></td>
                </tr>
                @endforeach
            </tbody>

        </table>
    @endif

        <form wire:submit="createEndpoint">
            <div class="uk-flex uk-flex-between ">
                <div class="uk-width-1-4">
                    <x-forms.textinput name="name" label="Name" wire:model.live="name" required="true"/>
                </div>

                <div class="uk-width-1-4  uk-margin-left">
                    <x-forms.select name="provider" label="Provider" :values="$this->providers" wire:model.live="provider"/>
                </div>

                <div class="uk-width-1-4 uk-margin-left">
                    <x-forms.select name="model" label="Model" :values="$this->models" wire:model.live="model"/>
                </div>
                <div class="uk-width-1-4 uk-margin-left">
                    <x-forms.numberinput class="uk-input" name="temperature" label="Temperature" required="true" value=".5" wire:model.live="temperature" min="0" max="1" step=".1"/>
                </div>
            </div>

            <div class="uk-flex uk-flex-right uk-margin-medium-top">

                <button class="uk-button uk-button-primary" type="submit"
                @if(!$this->valid) disabled @endif>Add Endpoint</button>
            </div>
        </form>


</div>
