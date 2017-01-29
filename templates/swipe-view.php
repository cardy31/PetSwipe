<div class="col-sm-4">
    <button type="submit" class="btn btn-danger">Bad</button>
</div>

<div class="col-sm-4">
    <img src="http://i.imgur.com/NoDketJ.jpg">
</div>

<div class="col-sm-4">
    <button type="submit" class="btn btn-submit">Good</button>
</div>

<script>
    document.onkeydown = function(e) {
        if (e.keyCode == '37') {
            // left
            $.post("submitSwipe.php",
                {
                    accept : "false"
                },
                function(data, status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
        } else if (e.keyCode == '39') {
            // right
        }
    };
</script>




