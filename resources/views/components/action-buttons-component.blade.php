<div class="btn-group-lg">
    <a href="{{route("manager.$entityPluraled.edit", [$entity => $entityId])}}"
       class="btn btn-primary">Редактировать</a>
    <a href="#" class="btn btn-danger" onclick="event.preventDefault(); deleteEntity()">Удалить</a>
    <form id="delete-entity-{{$entityId}}" method="POST"
          action="{{route("manager.$entityPluraled.destroy", [$entity => $entityId])}}">
        @csrf
        @method('DELETE')
    </form>
</div>


<script>

    function deleteEntity() {

        let confirmed = confirm('Вы действительно хотите удалить эту запись?')

        if (confirmed) {
            document.getElementById('delete-entity-{{$entityId}}').submit()
        }
    }
</script>
