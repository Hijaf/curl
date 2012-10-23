<div>
    <?= form_open('curl/choisir', array('method'=>'post'));?>
    <p>  
    <?= form_hidden('titre', $titre);?>
    <?= form_hidden('description', $description);?>
    </p>
    <h2><?= $titre?></h2>
    <p><?= $description?></p>
    <?php foreach ($imgs as $key=>$img): 
            $data = array(
                'name'        => 'image',
                'id'          => $key,
                'value'       => $img,
            );?>
            <p>
            <?= form_radio($data);?>
            <img src="<?=$img?>"/>
            </p>
    <?php endforeach;?>
    <p>
    <?= form_submit('monSubmit', 'Envoyer');?>      
    </p>
    <?= form_close()?>
</div>
