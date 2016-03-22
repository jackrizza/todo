<div class="card">
    <h1>Your Todo list.</h1>
    <ul>
        <div class="list"></div>
    </ul>
    <form action="/" method="POST" id="update">
        <input type="text" placeholder="do the trash" name="todo" autocomplete="off" class="text" required="">
        <input type="submit" value="update">
    </form>
</div>
<script type="text/javascript">

        function reload() {
            $.get("view/template/todo.list.html.php", function(data) {
                $(".list").html(data);
            });
        }
        reload();
        function remove(number) {
            var url = "/app/remove.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                    'number': number
                }),
                success: function(data) {
                    swal({   title: "Removing It!",   text: "",   type: "success",    timer: 1000,   showConfirmButton: false, confirmbutton : "good" });
                    reload();
                }
            });
        }

        function done(number) {
            var url = "/app/done.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: ({
                    'number': number
                }),
                success: function(data) {
                    swal({   title: "Great job!",   text: "",   type: "success",    timer: 1000,   showConfirmButton: false });
                    reload();
                }
            });
        }
        $("#update").submit(function(e) {
            var url = "/app/todo.php"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#update").serialize(), // serializes the form's elements.
                success: function(data) {
                    if(data == "done") {
                         swal({   title: "success!",   text: "",   type: "success", timer: 1000,   showConfirmButton: false, });
                     } else {
                         swal({   title: "error!",   text: data,   type: "error",   confirmButtonText: "dang nabit" });
                     }
                    reload();
                }
            });
            e.preventDefault();
            $(".text").val('');
        });
    </script>
