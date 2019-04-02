<?php

function buildTree($elements,$parentId=0){ //Recursive fonksiyon
$branch=array(); //branch dizi olarak tanımlandı
foreach ($elements as $element) {
    //kategoride Parent_id == 0 olanlar üst kategori olarak döngüye sokuluyor 
   if($element->parent_id == $parentId){
       //parent_id sahip olan id'ye ait parent_id (children) tekrar dögüye sokuluyor 
       $children = buildTree($elements,$element->id);
       if($children){ // ona ait id varsa onun children lerine atananıyor
           $element->children=$children;
       }else{ // yoksa boş dizi oluşturuluyor
           $element->children= array();
        }
        $branch[]=$element; //veriler branch atılıyor
   }
}
return $branch;
}
function drawElements($items){ //bu recursive fonksiyon bize kategorilerin düzgün bir biçimde listelenmesini sağlıyor
    echo "<ul>";
    foreach ($items as $item) {
        echo "<li>{$item->title}</li>";
        if(sizeof($item->children) > 0 ){
            drawElements($item->children);
        }
    }
    echo "</ul>";
}
?>