@extends('admin.layouts.app')

@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Brand</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('brands.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{ route('brands.update', $brand->id) }}" id="editBrandForm" name="editBrandForm" method="post">
            @csrf <!-- Add CSRF token -->

            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $brand->name }}">
                                <p></p>	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input readonly type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $brand->slug }}">	
                                <p></p>
                            </div>
                        </div>	
                        <div class="col-md-6"> <!-- Corrected md-6 -->
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control"> 
                                    <option {{ ($brand->status == 1 )? 'selected' : ''}} value="1">Active</option>
                                    <option {{ ($brand->status == 0 )? 'selected' : ''}} value="0">Block</option>
                                </select>	
                                <p></p>
                            </div>
                        </div>								
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('brands.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
@endsection

@section('customjs')
<script>
$(document).ready(function() { // Ensure DOM is ready
    $("#editBrandForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);

        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: element.attr('action'),
            type: 'put',
            data: element.serializeArray(),
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);

                if (response["status"] == true) {
                     alert('Update Succesfully'); 
                     window.location.href = "{{  route('brands.index') }}";
                } else {
                    // Handle errors
                }
            },
            error: function(jqXHR, exception) {
                console.log("Something went wrong");
            }
        });
    });

    $("#name").change(function() {
        var element = $(this);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: { title: element.val() },
            dataType: 'json',
            success: function(response) {
                if (response["status"] == true) {
                    $("#slug").val(response["slug"]);
                }
            }
        });
    });
});
</script>
@endsection
