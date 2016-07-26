<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="deletePostModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure you wish to delete this post?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <a href="#" id="modal-delete-post">
                    <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#deletePostModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var post = button.data('post');
        $('#modal-delete-post').attr("href", "/forum/post/" + post + "/delete/");
    })
</script>