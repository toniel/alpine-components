
<select x-data="{
    select2: null,
    options: @js($options),
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
    }
}" {{ $attributes }} x-ref="select2">

</select>
