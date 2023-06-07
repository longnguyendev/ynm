<?php
include "data.php";
function renderCard($product)
{
    $productModel = new ProductModel();
    $string = substr($product['description'], 0, 120);
    $result = "<div class='col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-5'>
    <a class='recommend-item' href='detail.php?id={$product['id']}'>
        <div class='img-item' style='background-image: url(./public/images/{$product['images']}'>
            <div class='info'>
                <div><span class='badge border border-2 border-info text-info user-select-none'><i class='fa-regular fa-eye'></i>{$product['product_view']}</span>
                </div>
                <div>";

    if (isset($_SESSION['user'])) {
        $result .= "<form action='like_controller.php' method='post'>
                            <input type='hidden' name='productId' value='{$product['id']}'>
                            <input type='hidden' name='userId' value='{$_SESSION['user']['id']}'>
                            <button type='submit' class='btn-like badge btn'";
        if ($productModel->checkLike($product['id'],  $_SESSION['user']['id'])) {
            $result .= "btn-danger text-light";
        } else {
            $result .= "text-danger";
        }
        $result .= "border border-2 border-danger'><i class='fa-regular fa-heart'></i>{$productModel->countLike($product['id'])}
        </button>
                        </form>";
    } else {
        $result .= "<button class='btn-like badge btn border border-2 border-danger text-danger'><i class='fa-regular fa-heart'></i>{$productModel->countLike($product['id'])}</button>";
    }
    $result .= "</div>
                        </div>
                    </div>
                    <a class='title-item' href='detail.php?id={$product[' id']}'>{$product['name']}
                    </a><br />
                    <span>{$product['dob']}</span>
                    <div class='text-item'>
            
                        <i><?php echo $string ?></i><br />
                    </div>
                </a>
            </div>";
}
