<select x-modelable="model" x-data="{
    select2: null,
    options: @js($options),
    model:null,
    init(){
        this.select2 = $(this.$refs.select2).select2({
            width:'100%',
            dropdownParent: $(this.$refs.select2).parent(),
            data: this.options.map((option) => {
                return {
                    id: option.id,
                    text: option.name
                }
            })
        })

        this.select2.on('select2:select', (e) => {
            this.model = e.params.data.id
        })
    }
}" {{ $attributes }} x-ref="select2">

</select>
