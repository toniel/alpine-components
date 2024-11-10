{{-- @dd($attributes) --}}
@props([
    'options' => [],
    'serverSide' => !is_null($attributes->get('data-ajax--url')),
    'value' => 'value',
    'label' => 'label',
    'multple' => false,
])
<select x-data="{
    options: @js($options),
    model:  null,
    multiple: @js($attributes->get('multiple')),
    serverSide: @js($serverSide),
    value: @js($value),
    label: @js($label),
    select2: null,
    clientOptions() {
        this.select2.select2({
            width: '100%',
            multiple: this.multiple,
            dropdownParent: $(this.$refs.select2).parent(),
            data: this.options.map((item) => {
                console.log('item', item[this.label])
                return { text: item[this.label], id: item[this.value] };
            })
        })
    },
    serverOptions() {
        this.select2.select2({
            width: '100%',
            multiple: this.multiple,
            dropdownParent: $(this.$refs.select2).parent(),
            placeholder: this.placeholder,

            ajax: {
                dataType: 'json',
                delay: 250,
                data: (params) => {
                    let query = {
                        q: params.term,
                        page: params.page || 1,
                    };
                    return query;
                },
                processResults: data => {
                    return {
                        results: data.data.map((item) => {
                            return { text: item[this.label], id: item[this.value] };
                        }),
                        pagination: {
                            more: data.current_page < data.last_page,
                        },
                    };
                },
                cache: true
            }
        });
    },
    init() {
        this.select2 = $(this.$refs.select2)
        if (this.serverSide) {

            this.serverOptions()
        } else {

            this.clientOptions()
        }



        this.select2.on('select2:select', (e) => {
            if (this.multiple) {
                console.log('e', e.params.data.id)
                console.log('this.model', this.model)
                this.model.push(e.params.data.id)
            } else {

                this.model = e.params.data.id
            }
        })

        this.select2.on('select2:unselect', (e) => {
            if (this.multiple) {
                console.log('e', e.params.data.id)
                // this.model.splice(this.model.indexOf(e.params.data.id), 1)
                this.model = this.model.filter(id => id !== e.params.data.id)
            } else {

                this.model = null
            }
        })
    }
}"  x-modelable="model" {{ $attributes }}  x-ref="select2">

</select>
