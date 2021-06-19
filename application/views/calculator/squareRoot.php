		<div class="container col-md-3 col-md-offset-4 well">
			<h2>Square Root</h2>
			<form action="<?= base_url(); ?>calculator/squareRoot" method="post">
                <div class="form-group">
                    <label for="number1">Enter Number :</label>
                    <input type="number" step=any class="form-control" id="number1" placeholder="Enter Number" name="number1" value="<?= $number1; ?>">
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <p class="text-success"><?= $total; ?></p>
                </div> 
                <button type="submit" class="btn btn-default" name="squareRoot">Square Root</button>
			</form>
			<?= $message; ?>
		</div>