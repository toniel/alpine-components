

<select x-modelable="model" x-data="{
    select2: null,
    options: @js($options),
    model:null,
    multiple: @js($attributes->get('multiple')),
    init(){
        this.select2 = $(this.$refs.select2).select2({
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
