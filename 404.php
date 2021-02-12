<?php

     include "includes/header.php";

?>
<div class="container">

<div class="row">
          <div class="col-sm-12">
            <div class="error-wrap">
              <div class="error-title">
                404
              </div>
              <div class="error-sub-title">
                Oops! That Page Can’t Be Found.
              </div>
              <p>Maybe Try Using The Search Or Navigate To Homepage.</p>

              <div>
                <form method="POST" action="search.php" class="search-container" method="POST">
                  <input type="text" placeholder="Search.." name="search" />
                <button type="submit"><i class="mdi mdi-magnify"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>

</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->

<?php

include "includes/footer.php";

?>
