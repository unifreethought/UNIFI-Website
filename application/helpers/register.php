<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
?>

		<div id="register">
			<h3><?php echo REGISTER_HEADER; ?></h3>
			<p><?php echo REGISTER_MESSAGE; ?></p>
			
			<hr />
			
			<form action="" method="POST">
				<!-- Right side form data -->
				<fieldset class="right">
					<label for=""></label>
						<input type="" id="" name="" /><br />
						
					<label for=""></label>
						<input type="" id="" name="" /><br />
					
					<label for=""></label>
						<input type="" id="" name="" /><br />
						
					<label for=""></label>
						<input type="" id="" name="" /><br />	
				</fieldset>
			
				<fieldset class="left">
					<!-- $fb_data :: id, name, first_name, last_name, link, gender, locale -->
					<?php
						// This is a security problem, I can fake the fb id (after I login) to become
						//  anyone who I want to.
						// I'd solve this with a unique session id linked to a facebook id. (That
						//  relation would be stored in a database.)
						// Also, why not just get the fb id again from when you process the form, then
						// if the two don't match alert the admins.
					?>
					<label for="register_fb_id"><?php echo REGISTER_FB_ID; ?></label>
						<input type="text" id="register_fb_id" name="fb_id" value="<?php echo $fb_data['id']; ?>" readonly disabled /><br />
					
					<label for="register_first_name"><?php echo REGISTER_FIRST_NAME; ?></label>
						<input type="text" id="register_first_name" name="first_name" value="<?php echo $fb_data['first_name']; ?>" /><br />
					
					<label for="register_last_name"><?php echo REGISTER_LAST_NAME; ?></label>
						<input type="text" id="register_last_name" name="last_name" value="<?php echo $fb_data['last_name']; ?>" /><br />
					
					<label for="register_gender"><?php echo REGISTER_GENDER; ?></label>
						<select name="gender">
							<option id="register_gender_female" value="female"><?php echo REGISTER_FEMALE; ?></option>
							<option id="register_gender_male" value="male"><?php echo REGISTER_MALE; ?></option>
							<option value="transgender"><?php echo REGISTER_TRANSGENDER; ?></option>
						</select>
						<script>
							(function () {
								var fb_gender = "<?php echo $fb_data['gender']; ?>";
							
								if (fb_gender == 'female') {
									document.getElementById('register_gender_female').selected = 'selected';
								}
							
								if (fb_gender == 'male') {
									document.getElementById('register_gender_male').selected = 'selected';
								}
							})();
						</script>
						
					<br /><br />
					<input type="submit" value="<?php echo REGISTER_SUBMIT; ?>" />
					
				</fieldset>
				
			</form>
		</div>
