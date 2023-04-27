<div class="modal fade mt-5" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Edit Article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    onclick="document.getElementById('preImgEdit').src=''" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin@postUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_user_id" id="editUserId">
                    <input type="hidden" name="post_id" id="PostID">
                    <!-- ========== Start Image ========== -->
                    <div class="mb-3">
                        <div class="row">
                            <span class="text-muted text-left ms-5">
                                Previous Image
                            </span>
                            <div id="oldImg-wrap" class="col-6" style="opacity: 0.6" alt="Old Image">
                            </div>

                            <img src="" id="preImgEdit" class="mb-2 col-6"
                                style="max-height:250px; object-fit:contain; width:100%">
                        </div>




                        <input type="file" id="imgEdit" name="post_img" class="d-none form-control form-control-sm"
                            onchange="document.getElementById('preImgEdit').src=window.URL.createObjectURL(this.files[0])">

                        <label for="imgEdit" class="text-light rounded px-2 text-center  py-1 d-block
                                bg-success">Update and Preview Image Here</label>
                        @error('post_img')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <!-- ========== End Image ========== -->

                    <!-- ========== Start Title ========== -->
                    <div class="mb-3">
                        <label for="title" class="form-label text-muted">Title:</label>
                        <input type="text" class="form-control shadow-none" id="titleInput" name="post_title"
                            placeholder="Post Title" style="70px" value="{{ old('post_title') }}">
                        @error('post_title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <!-- ========== End Title ========== -->

                    <!-- ========== Start Section ========== -->

                    <div class="mb-3">
                        <label for="para" class="form-label">Content:</label>
                        <textarea type="text" class="form-control shadow-none" id="contextInput" name="post_description"
                            rows="3" placeholder=" ">{{ old('post_description') }}</textarea>
                        @error('post_description')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <!-- ========== End Section ========== -->

                    <!-- ========== Start Category ========== -->
                    <div class="mb-3">
                        <label for="">Categories</label>
                        <select name="post_category" class="form-select" id="selectInput">
                            <option value="#" class="text-muted" selected hidden disabled> - Choice
                                Category
                            </option>
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('post_category')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <!-- ========== End Category ========== -->


                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>