<nav>
    <div class="half">
        <h1>Todo</h1>
    </div>
    <div class="half">
        <div id="nav-icon4">
          <span></span>
          <span></span>
          <span></span>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function(){
        $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
           $(this).toggleClass('open');
           $('.side-nav').toggleClass('offscreen');
        });
    });
</script>
