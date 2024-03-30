<?php
class Menu {
    private $name;
    private $price;
    private $image;
    private $orderCount = 0;

    public function __construct($name,$price,$image) {
        $this->name  = $name;
        $this->price = $price;
        $this->image = $image;
    }

// 税込みにするfunction
public function getTaxIncludedPrice(){
    return floor ($this->price*1.1);
}

// 名前を取得する
public function getName(){
    return $this->name;
}

// 画像を取得する
public function getImage() {
    return $this->image;
}

// オーダーカウントを取得する
public function getOrderCount() {
    return $this->orderCount;
}

// セッターを定義する
public function setOrderCount($orderCount){
    $this->orderCount = $orderCount;
}

// 合計金額
public function getTotalPrice(){
    return $this->getTaxIncludedPrice() * $this->orderCount ;
}
}


?> 