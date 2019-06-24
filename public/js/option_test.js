var type_number = document.getElementById('js-test-type');
type_number.onclick = function(){
    var type = type_number.options[type_number.selectedIndex].id;

    if(type == "type-2"){
    document.getElementById("noteDate_block").style.display='';
    } else {
    document.getElementById("noteDate_block").style.display='none';
    }
    if(type == "type-1"){
    document.getElementById("categories_block").style.display='';
    } else {
    document.getElementById("categories_block").style.display='none';
    }
}
