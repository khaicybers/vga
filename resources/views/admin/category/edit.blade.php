@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Category</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <form action="" method="post" id="categoryForm" name="categoryForm">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name Field -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                
                                <input type="text" name="name" id="name"  class="form-control" placeholder="Name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        
                        <!-- Slug Field -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <input type="text" name="image_id" id="image_id" value="">
                                <label for="image" class="me-3">Image</label>
                                <div id="image" class="dropzone dz-clickable border border-secondary rounded flex-grow-1">
                                    <div class="dz-message text-center py-5">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Field -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="1">Kích Hoạt</option>
                                    <option value="0">Không Kích Hoạt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-dark ms-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

    <!-- /.content -->
@endsection

@section('customJs')
<script>
    $("#categoryForm").submit(function(e) {
        e.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("categories.store") }}',
            type: "post",
            data: element.serializeArray(),
            dataType: "json",
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);

                if(response["status"] == true){

                    window.location.href="{{ route('categories.index') }}";

                    $("#name").removeClass("is-invalid").siblings('.invalid-feedback').html("");
                    $("#slug").removeClass("is-invalid").siblings('.invalid-feedback').html("");
                } else {
                    var errors = response['errors'];
                    if(errors['name']) {
                        $("#name").addClass("is-invalid").siblings('.invalid-feedback').html(errors['name']);
                    } else {
                        $("#name").removeClass("is-invalid").siblings('.invalid-feedback').html("");
                    }

                    if(errors['slug']) {
                        $("#slug").addClass("is-invalid").siblings('.invalid-feedback').html(errors['slug']);
                    } else {
                        $("#slug").removeClass("is-invalid").siblings('.invalid-feedback').html("");
                    }
                }
            },
            error:function(jqXHR, exception){
                console.log("Error occurred");
            }
        });
    });

    $("#name").change(function() {
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: "json",
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) {
                    $("#slug").val(response["slug"]);
                }
            },
            error:function(jqXHR, exception){
                console.log("Error occurred");
            }
        });
    });

    Dropzone.autoDiscover = false;    
    const dropzone = $("#image").dropzone({ 
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url:  "{{ route('img_temp.create') }}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, success: function(file, response){
            $("#image_id").val(response.image_id);
            //console.log(response)
        }
});


</script>
@endsection
