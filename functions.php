<?php
function getProducts() {
    $productsJson = file_get_contents('products.json');
    $products = json_decode($productsJson, true);

    foreach ($products as $product) {
        echo '
        <div class="col-12 col-md-4 mb-4">
            <div class="card h-100">
                <a href="' . $product['link'] . '">
                    <img src="' . $product['image'] . '" class="card-img-top" alt="Product Image">
                </a>
                <div class="card-body">
                    <ul class="list-unstyled d-flex justify-content-between">
                        <li>';

        for ($i = 0; $i < 5; $i++) {
            if ($i < $product['rating']) {
                echo '<i class="text-warning fa fa-star"></i>';
            } else {
                echo '<i class="text-muted fa fa-star"></i>';
            }
        }

        echo '
                        </li>
                        <li class="text-muted text-right">' . $product['price'] . '</li>
                    </ul>
                    <a href="' . $product['link'] . '" class="h2 text-decoration-none text-dark">' . $product['name'] . '</a>
                    <p class="card-text">' . $product['description'] . '</p>
                    <p class="text-muted">Reviews (' . $product['reviews'] . ')</p>
                </div>
            </div>
        </div>';
    }
}
?>
