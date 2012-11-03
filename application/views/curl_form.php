<div>
    <?= form_open('curl/ajouter', array('method'=>'post'));?>
        <p class="form1">
        <?= form_label('URL :', 'url');?>
        <?= form_input(array('id'=>'url', 'name'=>'url', 'placeholder'=>'Entrez une url', 'size'=>'68'));?>
        </p>
        <p class="form1">
        <?= form_submit('monSubmit', 'Envoyer');?>      
        </p>
        <?= form_close()?>
        <div>
            <?php if($articles):?>
            <h2>Mes publications</h2>
            <?php foreach ($articles as $article):?>
                <div class="article" id="<?= 'id'.$article->id?>">
                    <h3> <?=$article->titre?></h3>
                    <p id="temps">L'article a été publié il y a <?= timespan($article->temps);?></p>
                    <p id="img"><img src="<?= $article->image?>"/></p>
                    <p id="descrip"> <?= $article->description?></p>
                    <p id="liens">
                        <?= anchor('curl/supprimer/'.$article->id,'Supprimer la publication', array('title'=>'Supprimer la publication', 'class'=>'suppr'));?> - <?= anchor('curl/modifier/'.$article->id,'Modifier la publication', array('title'=>'Modifier la publication', 'id'=>'modif'));?>
                    </p>
                </div>
            <?php endforeach;endif;?>
        </div>
</div>
