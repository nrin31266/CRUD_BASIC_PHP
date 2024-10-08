<form class="form-group" action="index.php?action=add" method="post">
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <label>Id student</label>
          <input class="form-control" type="text" name="id_student" required>
          <label>First name</label>
          <input class="form-control" type="text" name="firstname" required>
          <label>Last name</label>
          <input class="form-control" type="text" name="lastname" required>
          <label>Date of birth</label>
          <input class="form-control" type="date" name="dob" required>
          <label>Email</label>
          <input class="form-control" type="email" name="email" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>
</form>

