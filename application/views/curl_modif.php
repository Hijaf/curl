<div>
    <?= form_open('curl/maj', array('method'=>'post'));?>
    <p>  
    <?= form_input(array('name'=>'titre', 'value'=>$art->titre, 'class'=>'input'));?>
    <?= form_textarea(array('name'=>'description', 'value'=>$art->description, 'class'=>'input'));?>
    <?= form_hidden('id', $art->id);?>
    </p>    
    <p id="submit">
    <?= form_submit('monSubmit', 'Envoyer');?>      
    </p>
    <?= form_close()?>
</div>