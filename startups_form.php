<div class="wrap">
	<h2>Cadastro de startup</h2>
	<form name="statups_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="id" vaule="<?php echo $form['id'] ?>">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div class="stuffbox primeira-etapa">
                    <h3>Etapa 1 - Login e Senha</h3>
					<div class="inside">
	                    <div>
	                        <label for="email">Email</label>
	                        <input name="email" type="email" id="email" value="<?php echo $form['email'] ?>" />
	                    </div>
	                    <div>
	                        <label for="senha">Senha</label>
	                        <input name="senha" type="password" id="senha" />
	                    </div>
	                    <div>
<<<<<<< HEAD
	                        <label for="senha_comfir">Confirmação Senha</label>
	                        <input name="senha_comfir" type="password" id="senha_confirm" />
=======
	                        <label for="senha-comfir">Confirmação Senha</label>
	                        <input name="senha-comfir" type="password" id="senha-confirm" />
>>>>>>> b87dd4baa5674930921bb250d21bffbcdd2acb59
	                    </div>
					</div>
                </div>

                <div class="stuffbox segunda-etapa">
                    <h3>Etapa 2 - Dados da Startup</h3>
                    <div class="inside">
						<div>
	                        <label for="nome">Nome da Startup</label>
	                        <input name="nome" type="text" id="nome" value="<?php echo $form['nome'] ?>" />
	                    </div>
	                    <div>
	                        <label for="endereco">Endereço</label>
	                        <input name="endereco" type="text" id="endereco" value="<?php echo $form['endereco'] ?>" />
	                    </div>
	                    <div>
<<<<<<< HEAD
	                        <label for="cidade">Cidade</label>
	                        <select name="cidade" id="cidade">
=======
	                        <label for="endereco">Cidade</label>
	                        <select name="endereco" id="endereco">
>>>>>>> b87dd4baa5674930921bb250d21bffbcdd2acb59
	                          <option value="">Escolha a cidade</option>
							  <?php foreach (get_cidades() as $cidade) : ?>
							  <option value="<?php echo $cidade[0] ?>" <?php echo ($form['cidade'] == $cidade[0]) ? 'selected' : '' ?>><?php echo $cidade[1] ?></option>
							  <?php endforeach ?>
	                        </select>
	                    </div>
	                    <div>
	                        <label for="elevator_pitch">Elevator Pitch</label>
	                        <textarea name="elevator_pitch" cols="50" rows="3" id="elevator_pitch"><?php echo $form['elevator_pitch'] ?></textarea>
	                    </div>
						<div>
							<label for="estagio">Estágio da Startup</label>
							<select name="estagio" id="estagio">
							  <option value="">Escolha o estágio</option>
							  <?php foreach (get_estagios() as $estagio) : ?>
							  <option value="<?php echo $estagio[0] ?>" <?php echo ($form['estagio'] == $estagio[0]) ? 'selected' : '' ?>><?php echo $estagio[1] ?></option>
							  <?php endforeach ?>
							</select>
						</div>
						<div>
							<label for="segmento">Segmento de Atuação</label>
							<?php $segmento_array = split(',', $form['segmento']); ?>
						    <?php foreach (get_segmentos() as $segmento) : ?>
								<input type="checkbox" name="segmento[]" id="segmento_<?php echo $segmento[0] ?>" <?php echo (in_array($segmento[0], $segmento_array)) ? 'checked' : '' ?>/>
								<label for="segmento_<?php echo $segmento[0] ?>"><?php echo $segmento[1]?></label>
						    <?php endforeach ?>
							<input type="text" name="segmento[10]" value="<?php echo (!is_int($segmento_array[count($segmento_array)-1])) ? $segmento_array[count($segmento_array)-1] : "" ?>" />
						</div>
	                    <div>
	                        <label for="fundacao">Data de fundação (dd/mm/aaaa)</label>
	                        <input name="fundacao" type="text" id="fundacao" value="<?php echo $form['fundacao']->format('d/m/Y'); ?>" />
	                    </div>
						<div>
							<label for="startup_ajuda">No que acha que o StartupMS pode te ajudar?</label>
							<select name="startup_ajuda" id="startup_ajuda">
							  <option value="">Escolha uma opção</option>
							  <?php foreach (get_startup_ajudas() as $startup_ajuda) : ?>
							  <option value="<?php echo $startup_ajuda[0] ?>" <?php echo ($form['startup_ajuda'] == $startup_ajuda[0]) ? 'selected' : '' ?>><?php echo $startup_ajuda[1] ?></option>
							  <?php endforeach ?>
							</select>
						</div>
						<div>
	                        <label for="url">URL</label>
	                        <input name="url" type="text" id="url" value="<?php echo $form['url'] ?>" />
	                    </div>
	                    <div>
	                        <label for="facebook">Facebook (fan page)</label>
	                        <input name="facebook" type="text" id="facebook" value="<?php echo $form['facebook'] ?>" />
	                    </div>
	                    <div>
	                        <label for="twitter">Endereço</label>
	                        <input name="twitter" type="text" id="twitter" value="<?php echo $form['twitter'] ?>" />
	                    </div>
	                    <div>
	                        <label for="logomarca">Logomarca</label>
	                        <input name="logomarca" type="file" id="logomarca" value="<?php echo $form['logomarca'] ?>" />
	                    </div>
	                    
					</div>
                </div>
                <div class="stuffbox terceira-etapa">
                    <h3>Etapa 3 - Dados dos Sócios</h3>
					<div class="inside">
						<fieldset>
							<legend>Sócio 1</legend>
							<div>
		                        <label for="nome_socio1">Nome</label>
		                        <input name="nome_socio1" type="text" id="nome_socio1" value="<?php echo $form['nome_socio1'] ?>" />
		                    </div>
							<div>
		                        <label for="email_socio1">Email</label>
		                        <input name="email_socio1" type="text" id="email_socio1" value="<?php echo $form['email_socio1'] ?>" />
		                    </div>
							<div>
		                        <label for="telefone_socio1">Telefone</label>
		                        <input name="telefone_socio1" type="text" id="telefone_socio1" value="<?php echo $form['telefone_socio1'] ?>" />
		                    </div>
							<div>
<<<<<<< HEAD
		                        <label for="cargo_socio1">Cargo</label>
		                        <input name="cargo_socio1" type="text" id="cargo_socio1" value="<?php echo $form['cargo_socio1'] ?>" />
		                    </div>
							<div>
=======
>>>>>>> b87dd4baa5674930921bb250d21bffbcdd2acb59
		                        <label for="formacao_socio1">Formação</label>
		                        <textarea name="formacao_socio1" cols="50" rows="3" id="formacao_socio1"><?php echo $form['formacao_socio1'] ?></textarea>
		                    </div>
						</fieldset>
						<fieldset>
							<legend>Sócio 2</legend>
							<div>
		                        <label for="nome_socio2">Nome</label>
		                        <input name="nome_socio2" type="text" id="nome_socio2" value="<?php echo $form['nome_socio2'] ?>" />
		                    </div>
							<div>
		                        <label for="email_socio2">Email</label>
		                        <input name="email_socio2" type="text" id="email_socio2" value="<?php echo $form['email_socio2'] ?>" />
		                    </div>
							<div>
		                        <label for="telefone_socio2">Telefone</label>
		                        <input name="telefone_socio2" type="text" id="telefone_socio2" value="<?php echo $form['telefone_socio2'] ?>" />
		                    </div>
							<div>
<<<<<<< HEAD
		                        <label for="cargo_socio2">Cargo</label>
		                        <input name="cargo_socio2" type="text" id="cargo_socio2" value="<?php echo $form['cargo_socio2'] ?>" />
		                    </div>
							<div>
=======
>>>>>>> b87dd4baa5674930921bb250d21bffbcdd2acb59
		                        <label for="formacao_socio2">Formação</label>
		                        <textarea name="formacao_socio2" cols="50" rows="3" id="formacao_socio2"><?php echo $form['formacao_socio2'] ?></textarea>
		                    </div>
						</fieldset>
						<fieldset>
							<legend>Sócio 3</legend>
							<div>
		                        <label for="nome_socio3">Nome</label>
		                        <input name="nome_socio3" type="text" id="nome_socio3" value="<?php echo $form['nome_socio3'] ?>" />
		                    </div>
							<div>
		                        <label for="email_socio3">Email</label>
		                        <input name="email_socio3" type="text" id="email_socio3" value="<?php echo $form['email_socio3'] ?>" />
		                    </div>
							<div>
		                        <label for="telefone_socio3">Telefone</label>
		                        <input name="telefone_socio3" type="text" id="telefone_socio3" value="<?php echo $form['telefone_socio3'] ?>" />
		                    </div>
							<div>
<<<<<<< HEAD
		                        <label for="cargo_socio3">Cargo</label>
		                        <input name="cargo_socio3" type="text" id="cargo_socio3" value="<?php echo $form['cargo_socio3'] ?>" />
		                    </div>
							<div>
=======
>>>>>>> b87dd4baa5674930921bb250d21bffbcdd2acb59
		                        <label for="formacao_socio3">Formação</label>
		                        <textarea name="formacao_socio3" cols="50" rows="3" id="formacao_socio3"><?php echo $form['formacao_socio3'] ?></textarea>
		                    </div>
						</fieldset>
					</div>
                </div>
				<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Update Options', 'oscimp_trdom' ) ?>" />
				</p>
			</div>
		</div>
	</form>
</div>
