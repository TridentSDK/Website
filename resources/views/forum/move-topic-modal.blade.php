<div class="modal fade" id="moveTopicModal" tabindex="-1" role="dialog" aria-labelledby="moveTopicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Which category to move this topic to?</h4>
            </div>
            <div class="modal-body">
                <select name="move-target" id="move-target" class="form-control">
                    @foreach(\TridentSDK\ForumCategory::whereParent(0)->orderBy("rank", "DESC")->get() as $category)
                        @php($i = 0)
                        @php($children = $category->childrenTree(true))
                        @foreach($children as $c)
                            <option value="{{ $c[1]->id }}">{{ str_repeat("&nbsp;", $c[0] * 8).$c[1]->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" id="modal-move-topic">Move</button>
            </div>
        </div>
    </div>
</div>

<script>
    var topic = null;

    $('#moveTopicModal').on('show.bs.modal', function (event) {
        topic = $(event.relatedTarget).data('topic');
    });

    $("#modal-move-topic").on("click", function () {
        window.location = "/forum/topic/" + topic + "/move/" + $("#move-target").val();
    });
</script>