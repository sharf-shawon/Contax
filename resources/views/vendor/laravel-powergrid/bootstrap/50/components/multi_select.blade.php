@if(filled($select))
    <div wire:ignore class="@if(!$inline) col-md-6 col-lg-3 @endif pt-2" style="max-width: 370px !important;">

        @if(!$inline)
            <label for="input_{!! $select['relation_id'] !!}">{{$select['label']}}</label>
        @endif
        <select data-none-selected-text="{{ trans('livewire-powergrid::datatable.multi_select.select') }}"
                multiple id="input_{!! $select['relation_id'] !!}"
                class="livewire_powergrid_select selectpicker_{!! $select['relation_id'] !!}
                    form-control active"
                wire:ignore
                data-live-search="{{ $select['live-search'] }}">

            <option value="">{{ trans('livewire-powergrid::datatable.multi_select.all') }}</option>
            @foreach($select['data_source'] as $relation)
                <option value="{{ $relation['id'] }}">{{ $relation[$select['display_field']] }}</option>
            @endforeach
        </select>

    </div>
    <style>
        .dropdown-toggle, .dropdown-item {
            padding-left: 15px;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: #454444;
            padding-top: 8px;
            padding-bottom: 8px;
        }
    </style>
    @push('powergrid_scripts')
        <!-- Power Grid Multi Select Scripts -->
        <script>
            $('.selectpicker_{!! $select['relation_id'] !!}').selectpicker();
            $('select.selectpicker_{!! $select['relation_id'] !!}').on('change', function () {
                const selected = $(this).find("option:selected");
                const arrSelected = [];
                selected.each(function () {
                    arrSelected.push($(this).val());
                });
                window.livewire.emit('eventMultiSelect', {
                    id: '{!! $select['relation_id'] !!}',
                    values: arrSelected
                })
                $('.selectpicker_{!! $select['field'] !!}').selectpicker('refresh');
            });
        </script>
        <!-- Power Grid Date Picker Scripts -->
    @endpush
@endif
