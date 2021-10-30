<div class="modal fade" id="createPermission" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">New permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('permissions.store') }}" method="POST" id="create-permission"
                      enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Enter Name"
                                   class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <small class="error-block form-text">{{ $message }}</small>
                            @enderror
                            <span class="help-block">Name in english</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="slug" class=" form-control-label">Slug</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="slug" name="slug" placeholder="Enter Slug"
                                   class="form-control @error('slug') is-invalid @enderror">
                            @error('slug')
                                <small class="error-block form-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" form="create-permission" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent

    @if($errors->has('name') || $errors->has('slug'))
        <script>
            $(function() {
                $('#createPermission').modal({
                    show: true
                });
            });
        </script>
    @endif
@endsection
