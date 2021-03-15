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
                    <option id="d-{{ $exercise->body_part_id  }}" value="{{ $exercise->id }}"> {{ $exercise->name }}</option>
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

<script>
    setTimeout(function () {
        const list = document.getElementById('exercise_id');

        if (localStorage.getItem('list')) {
            list.value = localStorage.getItem('list');
        }
        list.addEventListener('change', (el) => {
            localStorage.setItem('list', el.target.value);
        })

    }, 1000)

    $(document).ready(() => {
        $('.body-parts button').on('click', function() {
            $('.body-parts button').removeClass('active');
            $(this).addClass('active');
            let id = $(this).attr('data-part');
            $('#exercise_id').val('')
            $('option').show()
            $(`option:not(#d-${id})`).hide();

        })

    })
</script>
