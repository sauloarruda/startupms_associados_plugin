<div class="wrap">
	<?php    echo "<h2>" . __( 'Cadastro de startup', '' ) . "</h2>"; ?>
	<form name="statups_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div class="stuffbox">
					<?php    echo "<h3>" . __( '1º Etapa: Login e Senha', '' ) . "</h3>"; ?>
					<p>
						<label class="hide-if-no-js" style="" id="username-prompt-text" for="username">Nome de usuário</label>
						<input type="text" name="username" size="30" tabindex="1" value="<?php echo $form['username'] ?>" id="username" autocomplete="off">
					</p>
					<p>
						<label class="hide-if-no-js" style="" id="password-prompt-text" for="username">Senha</label>
						<input type="password" name="password" size="30" tabindex="1" value="<?php echo $form['password'] ?>" id="password" autocomplete="off">
					</p>
				</div>
				<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Update Options', 'oscimp_trdom' ) ?>" />
				</p>
			</div>
		</div>
	</form>
</div>
