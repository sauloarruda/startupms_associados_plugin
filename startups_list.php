<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Startups <a class="add-new-h2" href="admin.php?page=startups">Adicionar Nova Startup</a> </h2>

    <ul class="subsubsub">
        <li class="all"><a class="current" href="edit.php?post_type=post">Tudo <span class="count">(1)</span></a> |</li>
        <li class="publish"><a href="edit.php?post_status=publish&amp;post_type=post">Publicado <span class="count">(1)</span></a></li>
    </ul>
    <form method="get" action="" id="posts-filter">

    <p class="search-box">
        <label for="post-search-input" class="screen-reader-text">Pesquisar Startup:</label>
        <input type="search" value="" name="s" id="post-search-input">
        <input type="submit" value="Pesquisar startups" class="button" id="search-submit" name="">
    </p>    
    <table class="widefat">
        <thead>
            <th style="" class="manage-column column-title sortable desc" id="title" scope="col">
                <a href="edit.php?orderby=title&amp;order=asc">
                    <span>Name</span>
                    <span class="sorting-indicator"></span>
                </a>
            </th>
            <th style="" class="manage-column column-url" id="url" scope="col">
                Url
            </th>
        </thead>
        <tbody>
        <?php foreach ( $rows as $row ) : ?>
            <tr>
                <td style="padding:5px;">
                	<?php echo $row->nome; ?>
                	<div class="row-actions">
                		<span class="edit"><a title="Editar essa Startup" href="admin.php?page=startups&amp;action=edit&amp;startup_id=<?php echo $row->id;?>">Editar</a> | </span>
                		<span class="trash"><a href="admin.php?page=startups&amp;action=del&amp;startup_id=<?php echo $row->id;?>" title="Deletar essa Startup" class="submitdelete">Apagar</a></span>
                	</div>            
                </td>
                <td style="padding:5px;"><?php echo $row->email; ?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <th>Nome</th><th>Url</th>
        </tfoot>
    </table>
    <p>&nbsp;</p>
  </form>
</div>
