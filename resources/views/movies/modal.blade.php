<div class="modal fade" id="modal-movie" x-data="movie" @add-movie.window="addMovie()" @edit-movie.window="editMovie($event.detail)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" x-text="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="submit()">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title"
                            :class="{ 'is-invalid': errors && errors.title }" x-model="form.title">
                        <template x-if="errors && errors.title">
                            <span class="invalid-feedback" x-text="errors.title"></span>
                        </template>
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Synopsis</label>
                        <textarea class="form-control" id="synopsis" :class="{ 'is-invalid': errors && errors.synopsis }" rows="3"
                            x-model="form.synopsis"></textarea>
                        <template x-if="errors && errors.synopsis">
                            <span class="invalid-feedback" x-text="errors.synopsis"></span>
                        </template>
                    </div>
                    <div class="mb-3">
                        <label for="studio_id" class="form-label">Studio</label>
                        <x-select2 :options="$studios" class="form-select" x-model="form.studio_id" id="studio_id" />
                        <template x-if="errors && errors.studio_id">
                            <span  class="small text-danger" x-text="errors.studio_id"></span>
                        </template>

                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" x-model="form.year">
                    </div>
                    <div class="mb-3">
                        <label for="artists" class="form-label">Artists</label>
                        <x-select2 value="id" label="name" data-ajax--url="{{ route('api.artists.index') }}"
                            class="form-select" aria-label="Default select example" multiple x-model="form.artists"
                            id="artists" />
                        <template x-if="errors && errors.artists">
                            <span  class="small text-danger" x-text="errors.artists"></span>
                        </template>

                    </div>
                    <div class="mb-3 float-end">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <td><span x-text="form.title"></span></td>
                    </tr>
                    <tr>
                        <th>Synopsis</th>
                        <td><span x-text="form.synopsis"></span></td>
                    </tr>
                    <tr>
                        <th>Studio</th>
                        <td><span x-text="form.studio_id"></span></td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td><span x-text="form.year"></span></td>
                    </tr>
                    <tr>
                        <th>Artists</th>
                        <td><span x-text="form.artists"></span></td>
                    </tr>
                </table>

            </div>

        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('movie', () => ({
                form: {
                    title: '',
                    synopsis: '',
                    studio_id: '',
                    year: '',
                    artists: [],
                    _method: 'POST',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                errors: {},
                modalTitle: 'Add Movie',
                selectStudio: null,
                selectArtists: null,
                studios:@js($studios),
                addMovie() {
                    this.resetForm()
                    $('#modal-movie').modal('show')
                },
                editMovie(movie) {
                    console.log('movie', movie)
                    this.modalTitle = 'Edit Movie'
                    this.form = movie
                    $('#modal-movie').modal('show')

                    let selectedStudios = this.studios.map(s => {
                        return {
                            id: s.id,
                            text: s.name,
                            selected: s.id == movie.studio_id
                        }
                    })
                    let studioOption = new Option(selectedStudios)
                    $('#studio_id').append(studioOption).trigger('change' )
                },
                submit() {
                    axios.post('{{ route('movies.store') }}', this.form).then(res => {

                    }).catch(e => {
                        if (e.response.status == 422) {
                            console.log(e.response)
                            this.errors = e.response.data.errors
                        }
                    })
                },
                resetForm() {
                    this.form.title = ''
                    this.form.synopsis = ''
                    this.form.studio_id = ''
                    this.form.year = ''
                    this.form.artists = []
                    this.errors = {}
                },
                init() {
                    this.$watch('errors.studio_id', (val) => {
                        //    console.log(val)
                        if (val) {

                            $('#studio_id').next(".select2-container").addClass(
                                'select2-container--error')
                        } else {
                            $('#studio_id').next(".select2-container").removeClass(
                                'select2-container--error')

                        }
                    })
                    this.$watch('errors.artists', (val) => {
                        //    console.log(val)
                        if (val) {

                            $('#artists').next(".select2-container").addClass(
                                'select2-container--error')

                        } else {
                            $('#artists').next(".select2-container").removeClass(
                                'select2-container--error')
                        }
                    })
                }


            }))
        })
    </script>
@endpush
