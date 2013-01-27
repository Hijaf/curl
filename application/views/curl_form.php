<div>
    <?= form_open('curl/ajouter', array('method'=>'post'));?>
        <p class="form1">
        <?= form_label('Entrez une url pour participer à la mosaïque!', 'url');?>
        <?= form_input(array('id'=>'url', 'name'=>'url', 'placeholder'=>"Allez! J'attends ton url!"));?>
        <?php if(!$urlValid){echo('<span>Veuillez rentrer une URL valide</span>');}?>
        </p>
        <p class="form1">
        <?= form_submit(array('name'=>'monSubmit', 'value'=>'Envoyer', 'class'=>'bouton'));?>      
        </p>
        <?= form_close()?>
        <div>
            <?php if($articles): $i = 0;?>
            <h2>La mosaïque</h2>
            <?php foreach ($articles as $article):?>
                <?php 
                    $cote = mt_rand(1,2);
                    if($cote==1){?>
                    <div class="cdc" id="<?= 'cdc'.$i?>">
                        <p>
                            carré de couleur
                        </p>
                    </div>
                <?php }?>
                <div class="article" id="<?= 'id'.$article->id?>">
                    <h3> <?=$article->titre?></h3>
                    <p class="temps">L'article a été publié il y a <?= timespan($article->temps);?></p>
                    <p class="liens">
                        <?= anchor('curl/supprimer/'.$article->id,'Supprimer', array('title'=>'Supprimer la publication', 'class'=>'suppr'));?> - <?= anchor('curl/modifier/'.$article->id,'Modifier', array('title'=>'Modifier la publication', 'class'=>'modif'));?> la publication
                    </p>
                    <p class="img"><img src="<?= $article->image?>"/></p>
                    <p class="descrip"> <?= $article->description?></p>
                    <p class="lien">
                        <a href="<?= $article->urlSite?>">Allez vers <?= $article->titre?></a>
                    </p>
                </div>
                <?php if($cote==2){?>
                    <div class="cdc" id="<?= 'cdc'.$i?>">
                        <p>
                            carré de couleur
                        </p>
                    </div>
                <?php }?>
            <?php $i++; endforeach;endif;?>
        </div>
</div>
