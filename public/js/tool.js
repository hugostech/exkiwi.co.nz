/**
 * Created by Hugo on 15/05/16.
 */

function addone(){
    $('.item:last-child td:last-child').html('<button class="btn btn-danger btn-block" onclick="del_item(this)">Del</button>');
    $('.tem_item').clone().appendTo('#parkage_items');
    $('.tem_item').last().removeClass('hidden tem_item');
    //$('.item:last-child td:first-child').text($('.item').length);

}

function del_item(del_btn){

    $(del_btn).parents('.item').remove();

}