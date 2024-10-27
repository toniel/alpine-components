@props([
    'options'=>[],
    'serverSide' => !is_null($attributes->get('data-ajax--url')),
])

<select x-modelable="model" x-data="{
    select2: null,
    options: @js($options),
    model:null,
    multiple: @js($attributes->get('multiple')),
    serverSide: @js($serverSide),

    clientOptions(){
        this.select2.select2({
            width:'100%',
            multiple: this.multiple,
            dropdownParent: $(this.$refs.select2).parent(),
            data: this.options.map((option) => {
                return {
                    id: option.id,
                    text: option.name
                }
            })
        })
    },
    serverOptions(){
       this.select2.select2({
            width:'100%',
            multiple: this.multiple,
            dropdownParent: $(this.$refs.select2).parent(),
            ajax: {
        dataType: 'json',
        data: (params) => {
            let query = {
                search: params.term,
                page: params.page || 1,
            };
            return query;
        },
        processResults: data => {
            return {
                results: data.data.map((item) => {
                    return { text: item.name, id: item.id };
                }),
                pagination: {
                    more: data.current_page < data.last_page,
                },
            };
        },
    },



       })
    },

    init(){
        this.select2 = $(this.$refs.select2)

        if(this.serverSide){
            this.serverOptions()
        }else{
            this.clientOptions()
        }

        this.select2.on('select2:select', (e) => {
            if(this.multiple){
                this.model.push(e.params.data.id)
            }else{

            this.model = e.params.data.id
            }
        })

        this.select2.on('select2:unselect', (e) => {
            if(this.multiple){
                // this.model.splice(this.model.indexOf(e.params.data.id), 1)
                this.model = this.model.filter(id => id !== e.params.data.id)
            }else{

                this.model = null
            }
        })
    }
}" {{ $attributes }} x-ref="select2">

</select>
