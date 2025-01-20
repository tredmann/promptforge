@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('list-prompts')  }}">Prompts</a></li>
        <li><span>Add Prompt</span></li>
    </ul>
@endsection

<div>
    <div class="uk-flex uk-flex-between">
        <h1 class="uk-h2">Add Prompt</h1>
    </div>

    <form class="uk-form uk-form-stacked" wire:submit="add">
        <x-forms.textinput name="title" label="Title" required="true" wire:model.live="title"/>

        <x-forms.textarea name="description" label="Description" required="false" rows="2" wire:model.live="description"/>

        <x-forms.textarea name="prompt" label="Prompt" required="true" rows="10" wire:model.live="prompt"/>

        <x-forms.textinput name="response_type" label="Response Type" required="false" wire:model.live="response_type"/>

        <x-forms.textarea name="response_schema" label="Response Schema" required="false" rows="10" wire:model.live="response_schema"/>

        <div class="uk-margin-large-top uk-flex uk-flex-between">
            <a class="uk-button uk-button-default" href="">Cancel</a>


            <button
                    class="uk-button uk-button-primary"
                    type="submit"
            @if(!$this->isValid) disabled @endif
            >Add Prompt</button>

        </div>
    </form>

</div>
