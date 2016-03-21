<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> <?php echo $_SESSION['error']; ?>
  <?php unset($_SESSION['error']); ?>
</div>
<?php endif; ?>
<?php if (!isset($_SESSION['email'])): ?>
      <form action="/" method="POST" id="signin">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" name="password" class="col-sm-2 form-control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <a href="/#signup" class="btn btn-secondary">Sign Up</a>
          </div>
        </div>
      </form>
<?php else: ?>
    <ul>
        <div class="names"></div>
        <li>
            <form class="form-inline" action="/" method="POST" id="name">
              <div class="form-group">
                <input type="text" name="name" class="form-control text" id="exampleInputName1" placeholder="todo" required>
              </div>
              <button type="submit" class="btn btn-info">update</button>
            </form>

        </li>
    </ul>
    <?php if (isset($_SESSION['email'])): ?>
        <a href="#" class="btn btn-sucsess">Log Out</a>
    <?php endif ?>
<?php endif ?>
