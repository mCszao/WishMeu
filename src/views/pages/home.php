<?php $render('header', ['title' => 'Home']); ?>

<style>
    .list-container {
        margin: 10px auto;
        display: flex;
        flex-direction: column;
        height: 80vh;
        width: 60vw;
        gap: 1rem;
        
    }

    .list-item{
        background-color: #474747;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 1rem;
        height: 30vh;
       
        border-radius: 1rem;
    }

    .title{
        font-size: 32px;
        color: #53D8FB;
    }

    .see-more {
        background-color: #C4C6E7;
        padding: 0.5rem;
        
        border-radius: 1rem;
    }

    .see-more:hover{
        box-shadow: 10px 10px 146px 0px #FFFFFF;
        
    }

    .paragraph {
        color: #FFFFFF;
    }

    
</style>



<div class="list-container">
    <?php foreach ($list as $item): ?>
        <div class="list-item" id="<?=$item['id']?>">
            <h3 class="title"><?=$item['name']?></h3>
            <p class="paragraph">
                <?=$item['description']?>
            </p>

            <a class="see-more" href="<?=$base.'/'.'list'.'/'.$item['id']?>">Ver lista</a>
        </div>
    <?php endforeach; ?>    
</div>

<?php $render('footer'); ?>