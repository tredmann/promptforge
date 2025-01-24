<div>
        <h1 class="uk-h2">{{ $endpoint->prompt->title }}</h1>
        {{ $endpoint->prompt->description }}

        <form class="uk-form uk-margin-medium-top"  wire:submit="performRequest">

        @foreach($inputs as $input)

                <x-forms.textarea
                        wire:model.live="allInputs.{{$input}}"
                        rows="8"
                        :name="$input"
                        :label="\Illuminate\Support\Str::ucfirst($input)" required="true"></x-forms.textarea>

        @endforeach

                <div class="uk-margin-medium-top">
                        <button class="uk-button uk-button-primary">Request</button>
                </div>

        </form>


        @isset($answer)
        <pre>{{ $answer  }}</pre>
        @endisset
</div>
