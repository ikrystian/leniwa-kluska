<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-4">
        @if($training->start)
            <div>
                Training name: {{ $training->name  }}<br>
                Training date {{ $training->training_date }}<br>
            </div>
            <hr>
            {{ $total }}
            <h3>Dodaj ćwiczenie</h3>

            <form action="" wire:submit.prevent="addSeries({{$training->id}})">
                @if($parts)
                    <div class="body-parts-wrapper">
                        <nav class="body-parts">
                            @foreach($parts as $bodyPart)
                                <button type="button" data-part="{{$bodyPart->id}}">{{ $bodyPart->name  }}</button>
                            @endforeach
                        </nav>
                    </div>
                @endif
                <input type="hidden">
                <select name="exercise_id" id="exercise_id" wire:model="exercise_type_id" required>
                    <option value="">------</option>
                    @foreach($exercisesTypes as $exercise)
                        <option id="d-{{ $exercise->body_part_id  }}"
                                value="{{ $exercise->id }}"> {{ $exercise->name }}</option>
                    @endforeach
                </select><br>
                Ilość powtórzeń<br>
                <input type="number" wire:model="reps"><br>
                Waga<br>
                <input type="number" wire:model="weight"><br>
                <button type="submit">Zapisz</button>
            </form>
        @endif
        @if(!$training->start)
            <button wire:click="startTraining({{ $training->id  }})">Start training</button>
        @endif
        @if($training->start && !$training->stop)
            <button wire:click="stopTraining({{ $training->id  }})">Stop training</button>
        @endif

    </div>

    <div class="m-4">
        <button class="bg-gradient-to-r p-2 rounded-lg from-purple-400 via-pink-500 to-red-500 text-white"
                wire:click="removeTraining({{ $training->id  }})">Usuń trening
        </button>
    </div>
</div>
<script>
</script>
