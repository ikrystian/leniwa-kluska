<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-4">

    <div>
        Training id: {{ $training->id }}<br>
        Training name: {{ $training->name  }}<br>
        Training date {{ $training->training_date }}
    </div>
    <h3>Dodaj ćwiczenie</h3>

    <form action="" wire:submit.prevent="addSeries">
        <select name="exercise_id" id="exercise_id" wire:model="exercise_types_id">
            @foreach($exercisesTypes as $exercise)
                <option value="{{ $exercise->id }}"> {{ $exercise->name }}</option>
            @endforeach
        </select><br>
        Ilość powtórzeń<br>
        <input type="number" wire:model="reps"><br>
        Waga<br>
        <input type="number" wire:model="weight"><br>
        <button type="submit">Zapisz</button>
    </form>
</div>
