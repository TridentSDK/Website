<div class="modal fade" id="deleteTopicModal" tabindex="-1" role="dialog" aria-labelledby="deleteTopicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure you wish to delete this topic?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <a href="#" id="modal-delete-topic">
                    <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#deleteTopicModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var post = button.data('topic');
        $('#modal-delete-topic').attr("href", "/forum/topic/" + post + "/delete/");
    })
</script>