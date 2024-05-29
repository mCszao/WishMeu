<style>
    .section-container {
        margin-top: 1.5rem;
        width: 70vw;
        max-height: 60vh;
        overflow-y: scroll; 
        display:flex;
        flex-direction: column;
        gap: .5rem;
    }
    .section-item{
    border: 1px solid #000000;
    background-color: #fff;
    opacity: .5;
    display: flex;
    padding: 1rem;
    justify-content: space-between;
    align-items: center;
    border-radius: .2rem;
    }

    .section-item:hover{
        background-color: #0CF25D;
        cursor: pointer;
        box-shadow: 0px 10px 6px 0px black;
        opacity: 1;
    }
    .section-container::-webkit-scrollbar {
    display: none;
    }
    
    .edit-link:hover{
        color: yellow;
    }

    .button-delete {
        cursor:pointer;
    }
    .button-delete:hover {
        color: red;
    }
</style>

<section class="section-container">
    <?php foreach ($list as $item) : ?>
        <?php if($keyword === 'categorie' && $item['id'] == 17) continue;?>
        <div class="section-item">
            <p><strong><?=$item['name']?></strong></p>
            <i><?=(!isset($item['description'])) ? $item['observations'] : $item['description']?></i>
            <div>
                <a class="edit-link" href="<?=$base.'/'.$keyword.'/add/'.$item['id']?>">Editar</a>
                <a class="button-delete" href="<?=$base.'/'.$keyword.'/delete/'.$item['id']?>" onClick="return confirm('Deseja realmente excluir essa <?=$keywordPT?>')">Deletar</a>
            </div>
        </div>
    <?php endforeach; ?>    
</section>