<?php

namespace App;



class Cart
{
    public $items = array();
    public $totalqty = 0;
    public $totalprice = 0.00;

    public function __construct($oldcart) {
        if($oldcart){
            $this->items = $oldcart->items;
            $this->totalqty = $oldcart->totalqty;// 
            $this->totalprice = $oldcart->totalprice;
        }
         
    }

    public function add($product,$id,$quntity){

        $storedItem = ['item'=>$product , 'qty' =>0 , 'price' => $product->price];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] += $quntity;
        $storedItem['price'] = $product->price * $storedItem['qty'];
        $this->items[$id] = $storedItem; 
        $this->totalqty += $quntity;
        $this->totalprice += ($quntity * $product->price) ;
    }

    public function remove($id){

        
        
         $this->items[$id]['qty'] ; 
         $this->totalqty -= $this->items[$id]['qty'] ;
        $this->totalprice -= $this->items[$id]['price'];
         
         unset($this->items[$id]);

         return $this->items;
        // $this->items[$id]['qty'];
        // $this->totalprice += $product->price; 
                    //($quntity * $product->price) ;
    }
}
