<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update To-do</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class = 'updateContainer' action = "edit.php" method="post" >
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
            
            <input class = 'updateInputContainer' type="text" name = "updatedTodo" placeholder = 'Updated Todo'>
            <button class="updateBtn">Update</button>
       </form>
      </div>
    </div>
  </div>
</div>