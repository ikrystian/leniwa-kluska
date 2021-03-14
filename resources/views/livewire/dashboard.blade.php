@if($myTrainings)
    <div>
        <button id="showStats">
            Show user stats
        </button>

        <aside class="full-size-stats" id="full-size-stats">
            <div>
                <h1>Gratulacje, {{ Auth::user()->name }}!</h1>
                <h2>Przerzuciłeś<br><strong>{{ $myTrainings->sum('total') / 1000 }}</strong> ton<br><span> żelastwa w trakcie</span>
                </h2>
                <h3><strong>{{ $myTrainings->count() }}</strong> treningów<br>od <strong>{{ $diff }}</strong> dni</h3>
            </div>
        </aside>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-4">


            <ul class="flex flex-wrap">

                @foreach($myTrainings as $myTraining)
                    <li>

                        <a style="z-index: 8;"
                           class="p-2 m-1 text-sm inline-block rounded-lg @if($myTraining->archive_training)pointer-events-none bg-gray-50 cursor-not-allowed  @else bg-white @endif"
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
                <button class="add-training-button" wire:click="createEmptyTraining">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve">
<path style="fill:#1BCEB8;" d="M496,248c0,136.8-111.2,248-248,248S0,384.8,0,248S111.2,0,248,0S496,111.2,496,248z"/>
                        <path style="fill:#09ADB5;" d="M248,0c136.8,0,248,111.2,248,248S384.8,496,248,496"/>
                        <path style="fill:#0DBFBA;" d="M72.8,72.8c96.8-96.8,253.6-96.8,350.4,0s96.8,253.6,0,350.4"/>
                        <g>
                            <path style="fill:#EEFFFF;"
                                  d="M352.8,256H143.2c-6.4,0-12-1.6-12-8s5.6-8,12-8h209.6c6.4,0,12,1.6,12,8S359.2,256,352.8,256z"/>
                            <path style="fill:#EEFFFF;" d="M248,364c-6.4,0-8-4.8-8-12V143.2c0-6.4,1.6-12,8-12s8,4.8,8,12v209.6C256,359.2,254.4,364,248,364z
		"/>
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g></svg>
                </button>
            </div>
        </div>
        @endif
    </div>

    <script>
        let stats =  document.querySelector('#full-size-stats');
        document.querySelector('#showStats').addEventListener('click', function () {
            stats.style.display = 'flex';
        });

        stats.addEventListener('click', function () {
            stats.style.display = 'none';
        })
    </script>
