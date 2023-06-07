<?php
function renderCard($product)
{
    $string  = substr($product['description'], 0, 120);
    echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-5'>
    <a class='recommend-item' href = 'detail.php?id={$product['id']}'>
        <div class='img-item' style='background-image: url(./public/images/{$product['images']})'>
        </div>
        <a class='title-item' href='detail.php?id={$product['id']}'>
            {$product['name']}
        </a><br/>
        <span>{$product['dob']}</span>
        <div class='text-item'>   
            <i>{$string}</i><br/>
        </div>
    </a>
</div>";
}
