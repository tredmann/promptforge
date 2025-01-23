@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('list-prompts')  }}">Prompts</a></li>
        <li><a href="{{ route('show-prompt', ['prompt' => $prompt]) }}">{{ $prompt->title }}</a></li>
        <li><span>Create new request</span></li>
    </ul>
@endsection

<div>
    <div class="uk-flex uk-flex-between">
        <h1 class="uk-h2">Create Request for {{ $prompt->title  }}</h1>

    </div>

    <form wire:submit="create">
    <div class="uk-flex uk-flex-between ">
        <div class="uk-width-1-3">
            <x-forms.select name="provider" label="Provider" :values="$this->providers" wire:model.live="provider"/>
        </div>

        <div class="uk-width-1-3 uk-margin-left">
            <x-forms.select name="model" label="Model" :values="$this->models" wire:model.live="model"/>
        </div>
        <div class="uk-width-1-3 uk-margin-left">
            <x-forms.numberinput class="uk-input" name="temperature" label="Temperature" required="true" value=".5" wire:model.live="temperature" min="0" max="1" step=".1"/>
        </div>
    </div>

    <div class="uk-flex uk-flex-between uk-margin-medium-top">
        <a class="uk-button uk-button-default" href="">Cancel</a>
        <button class="uk-button uk-button-primary" type="submit">Create Request</button>
    </div>
    </form>
</div>
