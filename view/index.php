<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generate positions</title>
	<link rel="stylesheet" href="public/style.css">
</head>
	<header>
		<h1>Generate positions</h1>
    </header>
    <div class="main-content">

        <form class="form-validation" method="post" action="">

            <div class="form-title-row">
                <h1>Fill in the required counts!</h1>
            </div>
            <span class="form-invalid-data-info"><pre><?php echo $this->errors['message']; ?></pre></span>
            <div class="form-row form-input-name-row">

                <label>
                    <span>Count of Cells</span>
                    <input type="text" name="cellCount" value="<?php echo $this->m;?>">
                </label>

                 <span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

                <span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
                <span class="form-invalid-data-info"></span>

            </div>

            <div class="form-row form-input-email-row">

                <label>
                    <span>Count of Coins</span>
                    <input type="text" name="coinCount" value="<?php echo $this->n;?>">
                </label>

                <span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

                <span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
                <span class="form-invalid-data-info"></span>

            </div>
            <?php if($this->status > 0):?>
                <a href="result.txt">Show Variations</a>
            <?php endif;?>
            <div class="form-row">

                <button type="submit" name="send" value="1">Generate</button>

            </div>

        </form>

    </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

    $(document).ready(function() {

       
    });

</script>

</body>

</html>
