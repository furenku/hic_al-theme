<div id="form-container">

	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Buscar', 'twentyeleven' ); ?>" />
			<button class="submit" name="submit" id="searchsubmit">
				<i></i>
			</button>
	</form>

</div>
