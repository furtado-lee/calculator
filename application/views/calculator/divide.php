		<div class="container col-md-3 col-md-offset-4 well">
			<h2>Division</h2>
			<form action="<?= base_url(); ?>calculator/divide" method="post">
                <div class="form-group">
                    <label for="number1">Enter Numerator :</label>
                    <input type="number" step=any class="form-control" id="number1" placeholder="Enter Numerator" name="number1" value="<?= $number1; ?>">
                </div>
                <div class="form-group">
                    <label for="number2">Enter Denominator :</label>
                    <input type="number" step=any class="form-control" id="number2" placeholder="Enter Denominator" name="number2" value="<?= $number2; ?>">
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <p class="text-success"><?= $total; ?></p>
                </div> 
                <button type="submit" class="btn btn-default" name="divide">Divide</button>
			</form>
			<?= $message; ?>
		</div>