<div>
    Training id: {{ $training->id }}<br>
    Training name: {{ $training->name  }}<br>
    Training date {{ $training->training_date }}
    <hr>

    <table style="width: 100%" class=" 	table-auto border-separate border border-blue-800">
        <thead>
        <tr>
            <th>Exercise name</th>
            <th>Exercise id</th>
            <th>Reps</th>
            <th>Weight</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($training->exercises as $exercise)
            <tr>
                <th>{{ $exercise->type->name  }}</th>
                <th>{{ $exercise->id }}</th>
                <th>{{ $exercise->reps }}</th>
                <th>{{ $exercise->weight }}</th>
                <th>{{ $exercise->reps * $exercise->weight }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <ul>
    </ul>
</div>
