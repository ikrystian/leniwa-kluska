<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-4">
    <ul>
        @if($myTrainings)
            @foreach($myTrainings as $myTraining)
                <li>
                    {{ $myTraining->training_date }}
                    @if($myTraining->name != $myTraining->training_date)
                        <strong> ({{ $myTraining->name  }})</strong>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
    <div>
        <button class="add-training-button" wire:click="createEmptyTraining">Add training</button>
    </div>
</div>
