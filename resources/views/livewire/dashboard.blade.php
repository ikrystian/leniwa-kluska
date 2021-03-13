<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-4">
    @if($myTrainings)
        Ilość treninngów {{ $myTrainings->count() }} od 22.02.2021<br>
        Ilość podniesionych ciężarów <strong>{{ $myTrainings->sum('total') / 1000 }}</strong> ton
        ({{ $myTrainings->sum('total')  }}kg)
        <hr>
        <ul>

            @foreach($myTrainings as $myTraining)
                <li>

                    <a class="block p-1 m-1"
                       @if($myTraining->end)
                       href="/trainings/{{ $myTraining->id }}/view"
                       @else
                       href="/trainings/{{ $myTraining->id }}"
                       @endif
                    >

                        {{ $myTraining->training_date }}
                        @if($myTraining->name != $myTraining->training_date)
                            <strong> ({{ $myTraining->name  }})</strong>

                        @endif
                    </a>
                </li>
            @endforeach

        </ul>
        <div>
            <button class="add-training-button" wire:click="createEmptyTraining">Add training</button>
        </div>
    @endif
</div>
