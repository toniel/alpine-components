<div class="modal fade" id="modal-movie" x-data="movie" @add-movie.window="addMovie()">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" x-text="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" x-model="form.title">
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Synopsis</label>
                        <textarea class="form-control" id="synopsis" rows="3" x-model="form.synopsis"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="studio_id" class="form-label">Studio</label>
                        <x-select2 :options="$studios" class="form-select" aria-label="Default select example" x-model="form.studio_id" id="studio_id" />

                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" x-model="form.year">
                    </div>
                    <div class="mb-3">
                        <label for="artists" class="form-label">Artists</label>
                        <x-select2 data-ajax--url="{{ route('api.artists.index') }}" class="form-select" aria-label="Default select example" multiple x-model="form.artists" id="artists" />

                    </div>
                    <div class="mb-3 float-end">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
                },
                modalTitle: 'Add Movie',
                selectStudio:null,
                selectArtists:null,
                addMovie() {
                    $('#modal-movie').modal('show')
                },


            }))
        })
    </script>
@endpush
