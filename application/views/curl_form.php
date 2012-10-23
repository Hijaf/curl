<div>
    <?= form_open('curl/ajouter', array('method'=>'post'));?>
        <p>
        <?= form_label('URL :', 'url');?>
        <?= form_input(array('id'=>'url', 'name'=>'url', 'placeholder'=>'Une Url'));?>
        </p>
        <p>
        <?= form_submit('monSubmit', 'Envoyer');?>      
        </p>
        <?= form_close()?>
        <div>
            <?php if($articles):?>
            <h2>Mes publications</h2>
            <?php foreach ($articles as $article):?>
                <div>
                    <h3> <?=$article->titre?></h3>
                    <?= anchor('curl/supprimer/'.$article->id,'Supprimer la publication', array('title'=>'Supprimer la publication'));?>
                    <p><img src="<?= $article->image?>"/></p>
                    <p> <?= $article->description?></p>

                </div>
            <?php endforeach;endif;?>
        </div>
</div>
