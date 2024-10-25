<div class="modal fade" id="modal-movie" tabindex="-1" x-data="movie" @add-movie.window="addMovie()">
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
                        <select class="form-select" aria-label="Default select example" x-model="form.studio_id">
                            @foreach ($studios as $studio)
                                <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" x-model="form.year">
                    </div>
                    <div class="mb-3">
                        <label for="artists" class="form-label">Artists</label>
                        <select class="form-select" aria-label="Default select example" multiple x-model="form.artists">
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 float-end">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
                addMovie() {
                    $('#modal-movie').modal('show')
                }

            }))
        })
    </script>
@endpush
