<div>
    <?= form_open('curl/choisir', array('method'=>'post','id'=>'formuChoix'));?>
    <p>  
    <?= form_hidden('titre', $titre);?>
    <?= form_hidden('description', $description);?>
    <?= form_hidden('urlSite', $urlSite);?>
    </p>
    <h2><?= $titre?></h2>
    <p><?= $description?></p>
    <?php foreach ($imgs as $key=>$img): 
            $data = array(
                'name'        => 'image',
                'id'          => 'rad'.$key,
                'value'       => $img
            );?>
            <p class="choix">
            <?= form_radio($data);?>
            <label for="<?= 'rad'.$key?>"><img src="<?=$img?>" class="galerie"/></label>
            </p>
    <?php endforeach;?>
    <p id="submit">
    <?= form_button(array('id'=>'buttonP','name'=>'button', 'value'=>'Image précédente', 'content'=>'Image précédente', 'class'=>'bouton'));?>
    <?= form_button(array('id'=>'buttonS','name'=>'button', 'value'=>'Image suivante', 'content'=>'Image suivante', 'class'=>'bouton'));?>
    <?= form_submit(array('name'=>'monSubmit', 'value'=>'Envoyer', 'class'=>'bouton'));?>      
    </p>
    <?= form_close()?>
</div>
